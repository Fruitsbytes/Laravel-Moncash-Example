<?php

namespace App\Http\Livewire;

use App\Facades\MonCash\API;
use App\Facades\MonCash\ID;
use App\Models\Payment;
use Exception;
use Livewire\Component;

class CartPage extends Component
{

    public array $fruits = [];
    public float $total = 0;
    public int $bigTotal = 0;
    public float $fee = 0;


    public function render()
    {
        return view('livewire.cart-page')
            ->extends('layouts.index')
            ->section('content');
    }

    public function mount()
    {


        try {
            $cart = (array) session()->get('cart');
        } catch (Exception) {
        }

        if (isset($cart) && isset($cart['items'])) {
            $this->fruits = array_filter((array) $cart['items'], function ($fruit) {
                return $fruit['number'] > 0;
            });
            $this->total  = (float) $cart['total'];


            $this->bigTotal = ceil(1.1 * $this->total);

            // Compensate the leftover after ceiling, the API expects an int
            $this->fee = $this->bigTotal - $this->total;
        }

    }

    public function createPayment()
    {
        try {

            $id = ID::getNewId();

            $url = API::createPayement($id, $this->bigTotal);

            $payment = new Payment();

            $payment->redirectionUrl = $url;
            $payment->amount =  $this->bigTotal;
            $payment->cart = $this->fruits;
            $payment->orderID =  $id;

            $payment->save();

            return redirect()->away($url);

        } catch (Exception $e ) {
            session()->flash('message', $e->getMessage() ?? 'ERROR');
        }


    }
}
