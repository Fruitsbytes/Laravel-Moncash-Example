<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SuccessPage extends Component
{
    public function render()
    {
        return view('livewire.success-page')
            ->extends('layouts.index')
            ->section('content');
    }
}
