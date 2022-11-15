<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryPage extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;

    public function render()
    {
        return view('livewire.history-page', [
            'payements' => Payment::where('orderID', 'like', '%'.$this->search.'%')
                                  ->orWhere('transactionID', 'like', '%'.$this->search.'%')
                                  ->paginate($this->perPage),
        ])
            ->extends('layouts.index')
            ->section('content');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function formatDate(string $date): string
    {
        return Carbon::parse($date)->toDayDateTimeString();
    }
}
