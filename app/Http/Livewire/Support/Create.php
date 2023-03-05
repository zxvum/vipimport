<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use App\Models\SupportAttachment;
use App\Models\SupportTheme;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $themes = [];

    public $title = '';
    public $theme_id = 1;
    public $text = '';
    public $files = [];

    protected $rules = [
        'title' => ['required', 'string'],
        'theme_id' => ['required', 'integer', 'exists:support_themes,id'],
        'text' => ['required', 'string'],
        'files' => ['max:5'],
        'files.*' => ['image', 'mimes:jpg,jpeg,png,webp']
    ];

    public function updated($property){
        $this->validateOnly($property);
    }

    public function store(){
        $this->validate();

        $support = new Support();
        $support->title = $this->title;
        $support->theme_id = $this->theme_id;
        $support->status_id = 1;
        $support->text = $this->text;
        $support->save();

        foreach ($this->files as $attachment) {
            try {
                $path = $attachment->store('support-ticket-images', 'public');
                $filename = $attachment->getClientOriginalName();
                SupportAttachment::create([
                    'support_id' => $support->id,
                    'filename' => $filename,
                    'path' => $path
                ]);
            } catch (\Exception $e) {
                // Log the error or show an error message to the user
                Log::error('Attachment upload failed: ' . $e->getMessage());
                session()->flash('error', 'Attachment upload failed: ' . $e->getMessage());
            }
        }

        $this->updateSupportLimit();

        return to_route('support.table')->with('success', 'Обращение в поддержку успешно отправлено.');
    }

    public function updateSupportLimit(){
        // Get the current date and the user's IP address
        $today = Carbon::now()->format('Ymd');
        $ipAddress = \request()->ip();

        // Check if the user has exceeded the daily limit
        $cacheKey = "support_cases_{$ipAddress}_{$today}";
        $supportCaseCount = Cache::get($cacheKey, 0);

        // Increment the support case count and store it in cache
        Cache::put($cacheKey, $supportCaseCount + 1, Carbon::tomorrow());
    }

    public function mount(){
        $this->themes = SupportTheme::all();
    }

    public function render()
    {
        return view('livewire.support.create')->extends('layouts.app');
    }
}
