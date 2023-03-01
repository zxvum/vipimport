<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use App\Models\SupportTheme;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $themes = [];

    public $title = '';
    public $theme_id = 0;
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

        $files = $this->files;
        $fileDataArray = [];

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->store('public');
            $fileDataArray[] = [
                'path' => $path,
                'filename' => "$filename.$extension"
            ];
        }

        $fileDataJson = json_encode($fileDataArray);

        Support::create([
            'title' => $this->title,
            'theme_id' => $this->theme_id,
            'status_id' => 1,
            'text' => $this->text,
            'media' => $fileDataJson
        ]);

        return to_route('support.table')->with('support_create_success', 'Обращение в поддержку успешно отправлено.');
    }

    public function mount(){
        $this->themes = SupportTheme::all();
    }

    public function render()
    {
        return view('livewire.support.create')->extends('layouts.app');
    }
}
