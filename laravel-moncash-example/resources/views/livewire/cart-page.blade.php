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
                        @forelse( $fruits as $fruit )
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
                                        {{$fmt->formatCurrency($fruit['number'] * $fruit['price'], 'HTG')}}
                                    </div>
                                    <div class="ligature"></div>
                                </div>
                                <div>

                                </div>
                            </div>
                        @empty
                            <div class="emptyCart">
                                <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512"
                                     xml:space="preserve" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="Layer_1"/>
                                    <g id="Layer_2">
                                        <g>
                                            <path
                                                d="M423.9,232.9c0-12.8-10.4-23.2-23.2-23.2h-20.1c-0.5-1.1-1-2.2-1.7-3.2l-45.8-71.3c-3.3-5.1-8.4-8.7-14.3-10    c-6-1.3-12-0.2-17.2,3.1c-10.6,6.8-13.6,20.9-6.8,31.5l32,49.8H185.3l32-49.8c2.4-3.7,3.6-7.9,3.6-12.3c0-7.8-3.9-15-10.5-19.2    c-5.1-3.3-11.2-4.4-17.2-3.1c-5.9,1.3-11,4.8-14.3,10l-45.8,71.3c-0.7,1-1.2,2.1-1.7,3.2h-20.1c-12.8,0-23.2,10.4-23.2,23.2v1.5    c0,12.8,10.4,23.2,23.2,23.2h2.2l38.1,124.3c1,3.2,3.9,5.3,7.2,5.3h194.2c3.3,0,6.2-2.2,7.2-5.3l38.1-124.3h2.2    c12.8,0,23.2-10.4,23.2-23.2V232.9z M307.3,151.8c-2.3-3.6-1.3-8.4,2.3-10.8c1.8-1.1,3.8-1.5,5.9-1.1c2,0.4,3.8,1.6,4.9,3.4    l42.6,66.3h-18.5L307.3,151.8z M191.6,143.3c1.1-1.8,2.9-3,4.9-3.4c2-0.4,4.1-0.1,5.9,1.1c2.2,1.4,3.6,3.9,3.6,6.6    c0,1.5-0.4,2.9-1.2,4.2l-37.2,57.9h-18.5L191.6,143.3z M347.6,372.2H164.4l-35.2-114.6h253.5L347.6,372.2z M408.9,234.4    c0,4.5-3.7,8.2-8.2,8.2h-7.7c0,0-0.1,0-0.1,0H119.2c0,0-0.1,0-0.1,0h-7.7c-4.5,0-8.2-3.7-8.2-8.2v-1.5c0-4.5,3.7-8.2,8.2-8.2H137    c0,0,0.1,0,0.1,0h34.4c0,0,0,0,0,0c0,0,0,0,0,0h168.8c0,0,0,0,0,0c0,0,0,0,0,0h34.4c0,0,0,0,0.1,0h25.7c4.5,0,8.2,3.7,8.2,8.2    V234.4z"/>
                                            <path
                                                d="M208.9,342.8c4.1,0,7.5-3.4,7.5-7.5v-40.8c0-4.1-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5v40.8    C201.4,339.5,204.8,342.8,208.9,342.8z"/>
                                            <path
                                                d="M256,342.8c4.1,0,7.5-3.4,7.5-7.5v-40.8c0-4.1-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5v40.8C248.5,339.5,251.9,342.8,256,342.8z    "/>
                                            <path
                                                d="M303.1,342.8c4.1,0,7.5-3.4,7.5-7.5v-40.8c0-4.1-3.4-7.5-7.5-7.5s-7.5,3.4-7.5,7.5v40.8    C295.6,339.5,298.9,342.8,303.1,342.8z"/>
                                        </g>
                                    </g>
                                </svg>

                                <h3 class="title">Empty cart</h3>
                                <p>You have no items in your cart. You will find an amazing selection of delicious
                                    fruits in the <a href="{{ route('store') }}">Store.</a>
                                </p>
                                <p class="text-center">
                                    <span>🍇</span><span>🍈</span><span>🍉</span> <span>🥭</span><br/>
                                    <span>🍊</span><span>🍍</span><span>🍑</span><span>🍏</span><span>🍒</span><br/>
                                    <span>🍎</span><span>🍋</span><span>🍐</span><span>🍓</span><span>🥝</span><span>🍅</span><br/>

                                </p>

                            </div>
                        @endforelse

                    </div>
                    <div class="total">
                        <div>
                            Sub-Total <span class="money">{{$fmt->formatCurrency($total, 'HTG')}}</span>
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
                            <td> {{$fmt->formatCurrency($total, 'HTG')}}</td>
                        </tr>
                        <tr>
                            <td>+</td>
                            <td>
                                <small>10% fees</small>
                                <p> {{$fmt->formatCurrency($fee ,'HTG')}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> {{$fmt->formatCurrency($bigTotal, 'HTG')}}</td>
                        </tr>
                        </tbody>
                    </table>
                    @if( count($fruits) )
                        <div>
                            <div class="terms">
                                <small>Select a payment method</small>
                                <p>
                                    By continuing the transaction, you agree to our
                                    <a href="#">Term of service</a> and <a href="#">Privacy policy</a>
                                </p>
                            </div>
                            <div onclick="alert('😞 This payment method is unavailable is your region,')">
                                <img src="{{ asset('img/unavailable.png') }}" class="unavailable"
                                     alt="PayPal unavailable">
                            </div>

                            <div class="moncash" wire:click="createPayment">
                                <img src="{{ asset('img/moncash-button/MC_button.jpg') }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>


                    <div class="loading" wire:loading.flex>
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

            </div>
        </div>
    </div>

    <div id="toast-danger" style="min-width: 300px; min-height: 100px"
         @class([' fixed z-20 bottom-20 right-20 items-center p-4 mb-10  max-w-xs  rounded-lg shadow text-red-400 bg-red-900 flex',  "hidden"=> !session()->has('message')])  role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 rounded-lg bg-red-800 text-red-200">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">
            {{  session()->get('message') }}
        </div>
        <button type="button"
                class="ml-auto -mx-1.5 -my-1.5  rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5  inline-flex h-8 w-8 text-red-500 hover:text-white bg-red-800 hover:bg-red-700"
                data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

</div>

