<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class BuyPage extends Component
{
    public array $fruits;
    public float $total = 0;

    public int $items;

    public function mount()
    {

        try {
            $cart = (array) session()->get('cart');
        } catch (Exception) {
        }

        if (isset($cart) && isset($cart['items'])) {
            $this->fruits = $cart['items'];
            $this->total  = $cart['total'];
            $this->items  = $cart ['number_items'] ?? 0;
        } else {
            $this->resetCart();
        }

    }

    public function resetCart()
    {
        $this->fruits = [
            [
                "name"        => "Apple",
                "id"          => 1,
                "description" => "They are a rich source of dietary phytochemicals such as flavonoids.",
                "price"       => "0.99",
                "number"      => 0,
                "color"       => "red",
                "reviews"     => [
                    "average" => "4.50",
                    "number"  => "1200"
                ]
            ],
            [
                "name"        => "Mango",
                "id"          => 2,
                "description" => "Mango fruit is rich in pre-biotic dietary fiber, vitamins, minerals, and poly-phenolic flavonoid antioxidant compounds",
                "price"       => "1.35",
                "number"      => 0,
                "color"       => "orange",
                "reviews"     => [
                    "average" => "4.90",
                    "number"  => "2022"
                ]
            ],
            [
                "name"        => "Kiwi",
                "id"          => 3,
                "description" => "High in Vitamin C and dietary fiber and provide a variety of health benefits.",
                "price"       => "2.00",
                "number"      => 0,
                "color"       => "lime",
                "reviews"     => [
                    "average" => "4.90",
                    "number"  => "460"
                ]
            ],
            [
                "name"        => "Cherry",
                "id"          => 4,
                "description" => "They are a great source of vitamin C, calcium, iron, magnesium, and potassium,",
                "price"       => "0.20",
                "number"      => 0,
                "color"       => "rose",
                "reviews"     => [
                    "average" => "2.50",
                    "number"  => "123"
                ]
            ],
            [
                "name"        => "Grappe",
                "id"          => 5,
                "description" => "They are jam-packed with nutrients like vitamin C, vitamin K and powerful antioxidants that may improve your health",
                "price"       => "0.80",
                "number"      => 0,
                "color"       => "purple",
                "reviews"     => [
                    "average" => "4.28",
                    "number"  => "600"
                ]
            ]
        ];
        $this->total  = 0;
        $this->items  = 0;
        $this->saveCart();
    }

    public function saveCart()
    {
        session()->put('cart', [
            "total"        => $this->total,
            "items"        => $this->fruits,
            "number_items" => $this->items
        ]);

        $this->emitTo('cart', 'cartUpdated');
    }

    public function render()
    {
        return view('livewire.buy-page')
            ->extends('layouts.index')
            ->section('content');
    }

    public function add(int $id)
    {

        $total = 0;

        for ($i = 0; $i < count($this->fruits); $i++) {

            if ($this->fruits[$i]['id'] == $id) {
                $this->fruits[$i]['number']++;
                $this->items++;
            }

            $total += ((int) $this->fruits[$i]['number']) * ((float) $this->fruits[$i]['price']);
        }

        $this->total = $total;

        $this->saveCart();
    }

    public function remove(int $id)
    {
        $total = 0;

        for ($i = 0; $i < count($this->fruits); $i++) {

            if ($this->fruits[$i]['id'] == $id && $this->fruits[$i]['number'] > 0) {
                $this->fruits[$i]['number']--;
                $this->items--;
            }

            $total += ((int) $this->fruits[$i]['number']) * ((float) $this->fruits[$i]['price']);
        }

        $this->total = $total;


        $this->saveCart();
    }

}
