<?php

namespace App\Http\Livewire;

use App\Events\PaymentProcessed;
use App\Jobs\ProcessMonCashPayment;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class SuccessPage extends Component
{

    public string|null $transactionId;

    public Payment|null|array $payment;

    public bool $showNewPaymentNotification = false;

    protected $listeners = ["echo:payments,.payment.processed" => 'pong'];


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
            ProcessMonCashPayment::dispatch($this->transactionId);
        } catch (Exception $e) {
            session()->flash('error_message', 'Error while processing payment.'.$e->getMessage());
        }

        session()->put('cart', [
            "total"        => 0,
            "items"        => BuyPage::DEFAULT_FRUITS,
            "number_items" => 0
        ]);
    }

    public function loadPayment()
    {

        try {
            if ( ! empty($this->transactionId)) {
                $this->payment = Payment::where('transactionID', '=', $this->transactionId)->first();
            }
        } catch (Exception $e) {
            $this->payment = null;
        }
    }


    public function pong()
    {
        $this->payment = Payment::where('transactionID', '=', $this->transactionId)->first();
    }


}
