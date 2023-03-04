<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use App\Models\SupportTheme;
use Livewire\Component;

class Edit extends Component
{
    public $support;

    public $themes = [];

    public $title = '';
    public $theme_id = 1;
    public $text = '';
    public $files = [];
    public $attachments = [];

    public $selectedImage;

    public function mount($id){
        $this->support = Support::find($id);
        $this->themes = SupportTheme::all();

        $this->title = $this->support->title;
        $this->theme_id = $this->support->theme_id;
        $this->text = $this->support->text;
        $this->attachments = $this->support->attachments;
    }

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

    public function update(){
        $this->validate();

        $this->support->title = $this->title;
        $this->support->theme_id = $this->theme_id;
        $this->support->status_id = 1;
        $this->support->text = $this->text;
        $this->support->save();

        return to_route('support.table')->with('success', 'Обращение ID: '.$this->support->id.' успешно обновлено.');
    }

    public function openImageModal($image)
    {
        $this->selectedImage = $image;
        $this->dispatchBrowserEvent('openImageModal');
    }

    public function closeImageModal()
    {
        $this->dispatchBrowserEvent('closeImageModal');
    }

    public function render()
    {
        return view('livewire.support.edit')->extends('layouts.app');
    }
}
