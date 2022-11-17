<?php

namespace App\View\Components\Payment;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public int $amount = 0)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.payment.button');
    }
}
