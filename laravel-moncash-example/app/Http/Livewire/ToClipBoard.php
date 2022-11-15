<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToClipBoard extends Component
{
    public string|null $string = '';

    public function render()
    {
        return view('livewire.to-clip-board')
            ->extends('layouts.holder')
            ->section('to-clipboard');
    }
}
