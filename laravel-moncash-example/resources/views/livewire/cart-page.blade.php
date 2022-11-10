<div>
    @php
        $fmt = new NumberFormatter('en_EN', NumberFormatter::CURRENCY);
    @endphp
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
                                        <span class="ml-6 text-lg">{{$fruit['name']}}</span>
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
                            Sub-Total <span class="money">{{$fmt->formatCurrency($total, 'USD')}}</span>
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
                    </h2>

                    <table class="plusFees">
                        <tbody>
                        <tr>
                            <td colspan="2" style="text-align: end">Pay</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> {{$fmt->formatCurrency($total, 'USD')}}</td>
                        </tr>
                        <tr>
                            <td>+</td>
                            <td>
                                <small>10% fees</small>
                                <p> {{$fmt->formatCurrency($fee ,'USD')}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> {{$fmt->formatCurrency($bigTotal, 'USD')}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="terms">
                        <small>Select a payment method</small>
                        <p>
                            By continuing the transaction, you agree to our
                            <a href="#">Term of service</a> and <a href="#">Privacy policy</a>
                        </p>
                    </div>
                    <div onclick="alert('😞 This payment method is unavailable is your region,')">
                        <img src="{{ asset('img/unavailable.png') }}" class="unavailable" alt="PayPal unavailable">
                    </div>

                    <div class="moncash" wire:click="createPayment">
                        <img src="{{ asset('img/moncash-button/MC_button.jpg') }}" alt="">
                    </div>
                </div>
                @if( $loading )
                    <div class="loading">
                        <div role="status">
                            <div>Processing...</div>
                            <svg aria-hidden="true" viewBox="0 0 100 101" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor"/>
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill"/>
                            </svg>

                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

