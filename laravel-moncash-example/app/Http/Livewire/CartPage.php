<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class CartPage extends Component
{

    public bool $loading = false;
    public array $fruits;
    public int $total;

    const HOST_REST_API = [
        "sandbox"    => "https://sandbox.moncashbutton.digicelgroup.com/Api",
        "production" => "https://moncashbutton.digicelgroup.com/Api"
    ];


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
            $this->total  = (int) $cart['total'];
        }

    }
}
