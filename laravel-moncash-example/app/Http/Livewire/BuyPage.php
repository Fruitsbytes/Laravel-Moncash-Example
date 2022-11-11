<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class BuyPage extends Component
{

    const DEFAULT_FRUITS = [
        [
            "name"        => "Red Apple",
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
            "name"        => "Tropical Mango",
            "id"          => 2,
            "description" => "Mango fruit is rich in pre-biotic dietary fiber, vitamins, minerals, and poly-phenolic flavonoid antioxidant compounds",
            "price"       => "1.35",
            "number"      => 0,
            "color"       => "orange",
            "reviews"     => [
                "average" => "4.20",
                "number"  => "2022"
            ]
        ],
        [
            "name"        => "Delicious Kiwi",
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
            "name"        => "Small Cherry",
            "id"          => 4,
            "description" => "They are a great source of vitamin C, calcium, iron, magnesium, and potassium,",
            "price"       => "0.20",
            "number"      => 0,
            "color"       => "rose",
            "reviews"     => [
                "average" => "2.10",
                "number"  => "500"
            ]
        ],
        [
            "name"        => "Juicy Grappe",
            "id"          => 5,
            "description" => "They are jam-packed with nutrients like vitamin C, vitamin K and powerful antioxidants that may improve your health",
            "price"       => "0.80",
            "number"      => 0,
            "color"       => "purple",
            "reviews"     => [
                "average" => "4.28",
                "number"  => "600"
            ]
        ],
        [
            "name"        => "Rare Dragon Fruit",
            "id"          => 6,
            "description" => "Was created by legendary Dragons to store their power and defeat their enemies",
            "price"       => "40.99",
            "number"      => 0,
            "color"       => "red",
            "reviews"     => [
                "average" => "5.00",
                "number"  => "80"
            ]
        ]
    ];
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
            $this->initCart($cart);
        } else {
            $this->resetCart();
        }


    }

    public function render()
    {
        return view('livewire.buy-page')
            ->extends('layouts.index')
            ->section('content');
    }

    public function initCart(array $cart)
    {
        $fruits = self::DEFAULT_FRUITS;

        $this->fruits = [];
        $items        = $cart['items'] ?? [];
        $this->total  = 0;
        $this->items  = 0;


        foreach ($fruits as $fruit) {
            $obj = array_column($items, null, 'id')[$fruit['id']] ?? [];

            if (isset($obj['number'])) {
                ["number" => $n] = $obj;
            } else {
                $n = 0;
            }


            $this->fruits[] = [
                ...$fruit,
                "number" => $n ?? 0
            ];

            if ($n) {
                $this->total += $n * (float) $fruit['price'];
                $this->items++;
            }

        }
        $this->saveCart();

    }

    public function resetCart()
    {
        $this->fruits = self::DEFAULT_FRUITS;
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

    public function getImage(string $id){
        return file_exists(public_path("img/items/$id.jpg")) ?
            asset("img/items/$id.jpg") :
            asset("img/items/default.jpg");
    }
}
