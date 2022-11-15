<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Scratch extends Component
{
    public function render()
    {
        return view('livewire.scratch')
            ->extends('layouts.index')
            ->section('content');;
    }
}
