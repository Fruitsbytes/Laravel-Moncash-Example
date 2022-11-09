<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public int $number = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];


    public function mount()
    {
        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function updateCart()
    {
        try {
            $cart = session()->get('cart');
            if (isset($cart['number_items'])) {
                $this->number = $cart['number_items'];
            }
        } catch (\Exception) {

        }


    }
}
