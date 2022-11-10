<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class CartPage extends Component
{

    public bool $loading = false;
    public array $fruits;
    public float $total;
    public float $bigTotal;
    public float $fee;


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
            $this->fruits   = array_filter((array) $cart['items'], function ($fruit) {
                return $fruit['number'] > 0;
            });
            $this->total    = (float) $cart['total'];
            $this->fee      = .1 * $this->total;
            $this->bigTotal = 1.1 * $this->total;
        }

    }

    public function createPayment()
    {
        $this->loading = true;
    }
}
