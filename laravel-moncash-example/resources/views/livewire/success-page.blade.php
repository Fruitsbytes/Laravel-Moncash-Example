@php

    $fmt = new NumberFormatter('en_EN', NumberFormatter::CURRENCY);

@endphp


<div class="w-full  flex height-full items-center justify-center mt-6 shadow" wire:init="loadPayment">

    <div style="max-width: 1000px; width: 100%"
         class="relative width-full rounded-lg border-gray-800 border flex">
        <div
            style="background-color: #102957; background-repeat: no-repeat; background-image: url('{{ asset("img/bg-success.jpg") }}'); background-position: center; background-size: cover "
            class="relative hidden sm:flex flex-col items-center justify-center  flex-grow">
            <img src="{{asset('img/logo.png')}}" class="absolute  block bottom-20  grayscale opacity-5 mx-2"
                 alt="" style="max-width: 80%">
        </div>
        <div class="flex flex-col items-center justify-center p-5">
            <div role="status" class=" absolute top-2 right-2" wire:loading.flex>
                <svg class="inline mr-2 w-6 h-6   animate-spin  text-gray-600 fill-orange-400"
                     viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor"/>
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>

            <img src="{{ asset('img/success.gif') }}" alt="" style="width: 100px" class="block pt-6">
            <h2 class="text-gray-700 text-4xl font-bold mt-4">Payment posted</h2>

            <p class="text-gray-400 text-center text-sm">
                The payment was processed. Your order is on its way.
            </p>

            <p class="text-mono hover:text-red-600 text-gray-400 cursor-pointer flex items-center">
                <span>
                    <span class="text-gray-500">ID:</span> {{ $transactionId  }}
                </span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
            </p>

            @if(!empty($payment))

                @if($payment->message === 'successful')
                    <div class="text-mono text-xs text-gray-700 hover:text-red-700 cursor-pointer flex items-center">
                        <span><span class="text-gray-700">Ref:</span> {{ $payment->orderID }}</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                  d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
                <div class="flex items-center py-3 border border-gray-700 px-4 my-5 rounded-full">
                    @if($payment->message === 'successful')
                        <div class="rounded-full text-lime-400 bg-lime-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-lime-400 pl-4">
                            The payment is Successful.
                        </div>
                    @else
                        <div class="rounded-full text-orange-400 bg-orange-800">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="text-orange-400 pl-4" style="max-width: 300px">
                            We could not find a valid payment to finalize your purchase. Please
                            <a href="#" class="text-green-500 underline">Contact us</a>, if you believe there is a
                            problem.
                        </div>
                    @endif
                </div>
                <div class="font-mono font-bold text-3xl">
                    {{$fmt->formatCurrency($payment->cost, 'HTG')}}
                </div>
                <div class="flex">
                    @foreach($payment->cart as $item)
                        <div class="mx-1 p-1 px-2 border border-gray-700 rounded-full text-sm text-gray-400">
                            <span class="font-bold mr-2 font-mono text-gray-500">x{{$item['number']}}</span>
                            <span>{{$item['name']}}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p>?</p>
            @endif


            <div class="flex items-center justify-center mt-5 pt-6 mt-3 border-t  border-gray-800 w-full">

                <a href="{{route('store')}}" type="button" wire:loading.attr="disabled"
                   class="mr-6 focus:outline-none text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-900">
                    Continue shopping
                </a>


                <a href="{{route('orders')}}" type="button" wire:loading.attr="disabled"
                   class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium  focus:outline-none rounded-lg border  focus:z-10 focus:ring-4  focus:ring-gray-700  bg-gray-800  text-gray-400  border-gray-600  hover:text-white hover:bg-gray-700">
                    Check History
                </a>
            </div>
        </div>
    </div>

</div>
