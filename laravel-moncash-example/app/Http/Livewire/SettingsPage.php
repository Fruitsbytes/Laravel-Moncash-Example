<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SettingsPage extends Component
{
    public function render()
    {
        return view('livewire.settings-page')
            ->extends('layouts.index')
            ->section('content');;
    }
}
