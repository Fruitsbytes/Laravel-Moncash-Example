<div class="container orders mx-auto py-3 px-2 ">
    @php
        $fmt = new NumberFormatter('en_EN', NumberFormatter::CURRENCY);
    @endphp
    @vite('resources/css/paginated-results.scss')

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-6xl text-gray-500 font-bold">Orders</h2>
            <p class="md:text-sm text-gray-600">History of your past purchases</p>
        </div>
        <div>
            <label for="per-page" class="block mb-2 text-sm font-medium text-gray-400">
                <small0>Results per page</small0>
            </label>
            <select id="per-page" style="max-width: 70px" wire:model="perPage"
                    class="border text-sm text-center ml-auto rounded-lg  block w-full p-1.5 px-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500">
                <option value="1">1</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <div>

        <div class="results">
            @forelse ($payements as $payement)
                <div class="result">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div
                                class="w-8 h-8 rounded-full text-purple-400 bg-purple-600 flex justify-center items-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-sm text-gray-400">
                            {{ $this->formatDate($payement->created_at)}}
                            <p class="text-xs truncate text-gray-600">
                                @livewire('to-clip-board', ['string' => $payement->orderID])
                            </p>
                        </div>
                        <div style="width: 120px">
                            <div class="text-sm font-medium  truncate text-red-500">
                                @livewire('to-clip-board', ['string' => $payement->transactionID])
                            </div>
                            <p> {{ $payement->message }}</p>
                        </div>
                        <div class="flex-1 min-w-0">
                            @foreach($payement->cart as $item)
                                <div class="mr-1 mb-1 p-1 py-0 border border-gray-700 rounded-full text-xs text-gray-400 inline-block">
                                    <span class="font-bold mr-1 font-mono text-gray-500">x{{$item['number']}}</span>
                                    <span>{{$item['name']}}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="px-1 pr-3" style="min-width: 125px">
                            @if(!empty($payement->payer))
                                <p class="text-xs text-gray-500 text-right">
                                    Payed using <b class="text-red-600">MonCash</b> <br>
                                    via <b>+{{$payement->payer}}</b>
                                </p>
                            @endif
                        </div>
                        <div class="inline-flex items-center text-base font-mono text-gray-500e">
                            {{$fmt->formatCurrency($payement->amount, 'HTG')}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="mx-auto p-4 flex flex-col items-center justify-center">
                    <img class="block py-4" style="width: 200px" src="{{ asset('img/fruitsBasket.jpg') }}" alt="">
                    <h3 class="text-4xl text-gray-400">No orders yet</h3>
                    <div class="text-center">
                        <a href="{{ route('store') }}"
                           class="my-6 block focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 bg-lime-600 hover:bg-lime-700 focus:outline-none focus:ring-lime-800">Go shopping</a>
                        <p class="text-gray-800">Your smoothie is waithing!</p>
                    </div>
                </div>
            @endforelse
        </div>


        {{ $payements->links() }}
    </div>
</div>

