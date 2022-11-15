<?php

namespace App\Http\Livewire;

use App\Facades\MonCash\API;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SuccessPage extends Component
{

    /**
     * @var string
     */
    public string $transactionId;

    public Payment|null $payment;


    public function render()
    {
        return view('livewire.success-page')
            ->extends('layouts.index')
            ->section('content');
    }

    public function mount()
    {
        $this->transactionId = Request::input('transactionId');
        try {
            $this->payment = Payment::where('transactionID', $this->transactionId)->first();
        } catch (Exception $e) {
            $this->payment = null;
        }
    }

    public function loadPayment()
    {
        if (empty($this->payment) || $this->payment->message !== 'successful') {
            try {
                $payment = API::getTransaction($this->transactionId);
                if(empty($this->payment)){
                    $this->payment->update($payment->toUpdateArray());
                }
            } catch (Exception $e) {
                $this->payment = null;
            }
        }
    }
}
