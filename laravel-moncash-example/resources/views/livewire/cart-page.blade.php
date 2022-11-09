<?php

$fmt = new NumberFormatter('en_EN', NumberFormatter::CURRENCY);

?>
@vite('resources/css/cart-page.scss')
<div class="checkout">
    <h1 class="text-6xl text-gray-500 font-bold">Checkout</h1>
    <div class="container-fluid p-2">

        <div class="cart">
            <div>
                <a class="back" href="{{route('store')}}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h2>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Cart
                </h2>
                <div class="items">
                    @foreach($fruits as $fruit)
                        <div class="item">
                            <div>
                                <img src="{{asset('img/items/'.$fruit['id'].'.jpg')}}" alt="">
                                <h4>
                                    <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span class="font-mono text-red-500 ml-2">{{$fruit['number']}}</span>
                                    <span class="ml-6">{{$fruit['name']}}</span>
                                </h4>
                                <div class="subTotal">
                                    {{$fmt->formatCurrency($fruit['number'] * $fruit['price'], 'USD')}}
                                </div>
                                <div class="ligature"></div>
                            </div>
                            <div>

                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="total">
                    <div>
                        Total <span class="money">{{$fmt->formatCurrency($total, 'USD')}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="payment">
            <div>
                <h2>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    Pay
                </h2>
                <div>
                    <img src="{{asset('img/unavaillable.png')}}" class="unavaillable">
                </div>

            </div>
        </div>
    </div>
</div>
