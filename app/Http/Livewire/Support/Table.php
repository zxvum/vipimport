<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use Livewire\Component;

class Table extends Component
{
    public $supports = [];

    public function mount(){
        $this->supports = Support::all();
    }



    public function render()
    {
        return view('livewire.support.table')->extends('layouts.app');
    }
}
