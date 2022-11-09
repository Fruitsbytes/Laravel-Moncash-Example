<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HistoryPage extends Component
{
    public function render()
    {
        return view('livewire.history-page')
            ->extends('layouts.index')
            ->section('content');
    }
}
