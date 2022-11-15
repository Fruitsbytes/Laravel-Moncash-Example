<?php

$fmt = new NumberFormatter('en_EN', NumberFormatter::CURRENCY);

?>


<div class="container mx-auto py-3 px-2 ">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-6xl text-gray-500 font-bold">Store</h1>
            <p class="md:text-sm text-gray-600">Select the amount of fruits you want to buy</p>
        </div>
        <div>

            <div class="border border-orange-700 rounded-lg p-2 text-red-400 shadow-md">
                {{--  Force dynamique class in / TODO use class defined in .scss + @apply--}}
                <span class="bg-rose-200 text-rose-900"></span>
                <span class="bg-lime-200 text-lime-900"></span>
                <span class="bg-red-200 text-red-900"></span>
                <span class="bg-orange-200 text-orange-900"></span>
                <span class="bg-purple-200 text-purple-900"></span>
                <table>
                    <tbody class="">

                    @if($total > 0)
                        <tr>
                            <td colspan="2" class="text-red-400 mr-3 pb-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        Cart
                                    </div>

                                    <button wire:click="resetCart" class="text-red-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>

                            </td>
                        </tr>
                        <tr class="border-b border-red-900">
                            <td colspan="2 ">
                                <div class="grid grid-cols-3 gap-2 pb-4">
                                    @foreach($fruits as $fruit)
                                        @if($fruit['number'] > 0)
                                            <span
                                                class="text-sm font-medium mr-2 px-2.5 py-0.5 rounded bg-{{$fruit['color']}}-200 text-{{$fruit['color']}}-900">
                                   x{{$fruit['number']}} {{$fruit['name']}}
                               </span>
                                        @endif
                                    @endforeach
                                </div>

                            </td>
                        </tr>
                    @endif

                    <tr class="border-b border-red-900">
                        <td class=" py-3">Total</td>
                        <td class=" py-3" style="min-width: 100px; text-align: end; padding-left: 12px">
                            {{$fmt->formatCurrency($total, 'HTG')}}
                        </td>
                    </tr>
                    @if($total > 0)
                        <tr>
                            <td colspan="2">
                                <a href="{{route('cart')}}" class="flex items-center pb-2 text-lime-500 justify-end">
                                    Go to cart
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-6">
        <div
            class="rounded-lg border relative flex items-center justify-center shadow-md bg-gray-800 border-gray-700 relative"
            style="width: 300px; color: #FF3E0A; font-size: 50px">
            <span class="font-sans"><</span> <span class="mr-2 font-sans">code></span>

            <svg class="absolute top-4 left-4 block text-gray-700" height="32px" viewBox="0 0 48 48"
                 width="48px" xml:space="preserve" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <path clip-rule="evenodd"
                      d="M43,43H8c-2.209,0-4-1.791-4-4V19.858C2.277,19.412,1,17.862,1,16v-2.973  c0-0.002,0-0.003,0-0.005V13c0-0.157,0.043-0.3,0.107-0.433c0.005-0.009,0.012-0.015,0.017-0.023  c0.066-0.127,0.159-0.232,0.271-0.32l6.83-6.829C8.407,5.161,8.68,5,9,5h0.021c0.002,0,0.004,0,0.006,0h5.994  c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0H43  c2.209,0,4,1.791,4,4l0,0v30C47,41.209,45.209,43,43,43z M15,41L15,41v-9h-4v9l0,0H15z M3,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2H3  V16z M9.381,7l-5,5h3.238l5-5H9.381z M9,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2H9V16z M15.381,7l-5,5h3.238l5-5H15.381z M15,16  c0,1.104,0.896,2,2,2s2-0.896,2-2v-2h-4V16z M21.381,7l-5,5h3.238l5-5H21.381z M21,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2h-4V16z   M27.381,7l-5,5h3.238l5-5H27.381z M32,8.381l-5,5V16c0,2.209-1.791,4-4,4c-1.201,0-2.267-0.541-3-1.379  C19.267,19.459,18.201,20,17,20s-2.267-0.541-3-1.379C13.267,19.459,12.201,20,11,20c-1.203,0-2.268-0.541-3.002-1.381  C7.477,19.21,6.789,19.654,6,19.858V39c0,1.104,0.896,2,2,2h1l0,0V31c0-0.553,0.447-1,1-1h6c0.553,0,1,0.447,1,1v10l0,0h13  c1.104,0,2-0.896,2-2V8.381z M45,9c0-1.104-0.896-2-2-2h-9v32c0,0.732-0.211,1.41-0.555,2H43c1.104,0,2-0.896,2-2V9z M28,32L28,32  h-8l0,0c-0.553,0-1-0.447-1-1v-7c0-0.553,0.447-1,1-1h8c0.553,0,1,0.447,1,1v7C29,31.553,28.553,32,28,32z M27,25h-6v5h6V25z"
                      fill-rule="evenodd"/></svg>
        </div>
        @foreach ( $fruits as $fruit)
            <div class="rounded-lg border relative shadow-md bg-gray-800 border-gray-700" style="width: 300px">

                <img class="rounded-t-lg block bg-blue-700" style="width:300px; height: 200px"
                     src="{{ $this->getImage($fruit['id']) }}" alt="Fruit"/>

                <div class="absolute w-full" style="top: 165px">
                    <div
                        class="flex items-center justify-end w-full p-1 px-2 rounded-t-lg bg-opacity-50 bg-gray-900">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <p class="ml-2 text-sm font-bold text-white">{{ $fruit['reviews']['average'] }}</p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#" class="text-sm font-medium underline hover:no-underline text-white">
                            {{ $fruit['reviews']['number'] }} reviews
                        </a>

                        <span class="ml-8 font-mono block"
                              style="font-size: 20px">{{ $fmt->formatCurrency($fruit['price'], 'HTG') }}</span><sup>/lbs</sup>
                    </div>
                </div>

                <div class="p-3">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ $fruit['name'] }}</h5>
                    <p class="mb-3 font-normal text-sm text-gray-400"
                       style="height: 65px">{{ $fruit['description'] }}</p>

                    <div class="flex justify-between border-t border-gray-700 pt-2">
                        <button type="button" wire:click="add('{{ $fruit['id'] }}')"
                                class="inline-flex items-center py-2 px-2 text-sm font-medium text-center text-white rounded-full focus:ring-4 focus:outline-none  bg-gray-800 shadow-md hover:bg-lime-700 focus:ring-lime-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                        <div>
                            <input readonly style="width: 100px" type="number" value="{{$fruit['number']}}"
                                   class="border text-center border-gray-300 text-sm rounded-lg bloc  p-2.5 bg-gray-800 border-gray-700 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500"
                                   placeholder="0">
                        </div>
                        <button type="button" wire:click="remove('{{ $fruit['id'] }}')"
                                class="inline-flex items-center py-2 px-2 text-sm font-medium text-center text-white rounded-full  focus:ring-4 focus:outline-none  bg-gray-800 shadow-md hover:bg-amber-700 focus:ring-amber-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 12H4"></path>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
        @endforeach

        <div
            class="rounded-lg border relative flex items-center justify-center shadow-md bg-gray-800 border-gray-700 relative"
            style="width: 300px; color: #FF3E0A; font-size: 50px">
            <span class="font-sans"><</span> <span class="mr-2 font-sans">/code></span>

            <svg class="absolute bottom-4 right-4 block text-gray-700" height="32px" viewBox="0 0 48 48"
                 width="48px" xml:space="preserve" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <path clip-rule="evenodd"
                      d="M43,43H8c-2.209,0-4-1.791-4-4V19.858C2.277,19.412,1,17.862,1,16v-2.973  c0-0.002,0-0.003,0-0.005V13c0-0.157,0.043-0.3,0.107-0.433c0.005-0.009,0.012-0.015,0.017-0.023  c0.066-0.127,0.159-0.232,0.271-0.32l6.83-6.829C8.407,5.161,8.68,5,9,5h0.021c0.002,0,0.004,0,0.006,0h5.994  c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0h5.994c0.002,0,0.004,0,0.006,0H43  c2.209,0,4,1.791,4,4l0,0v30C47,41.209,45.209,43,43,43z M15,41L15,41v-9h-4v9l0,0H15z M3,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2H3  V16z M9.381,7l-5,5h3.238l5-5H9.381z M9,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2H9V16z M15.381,7l-5,5h3.238l5-5H15.381z M15,16  c0,1.104,0.896,2,2,2s2-0.896,2-2v-2h-4V16z M21.381,7l-5,5h3.238l5-5H21.381z M21,16c0,1.104,0.896,2,2,2s2-0.896,2-2v-2h-4V16z   M27.381,7l-5,5h3.238l5-5H27.381z M32,8.381l-5,5V16c0,2.209-1.791,4-4,4c-1.201,0-2.267-0.541-3-1.379  C19.267,19.459,18.201,20,17,20s-2.267-0.541-3-1.379C13.267,19.459,12.201,20,11,20c-1.203,0-2.268-0.541-3.002-1.381  C7.477,19.21,6.789,19.654,6,19.858V39c0,1.104,0.896,2,2,2h1l0,0V31c0-0.553,0.447-1,1-1h6c0.553,0,1,0.447,1,1v10l0,0h13  c1.104,0,2-0.896,2-2V8.381z M45,9c0-1.104-0.896-2-2-2h-9v32c0,0.732-0.211,1.41-0.555,2H43c1.104,0,2-0.896,2-2V9z M28,32L28,32  h-8l0,0c-0.553,0-1-0.447-1-1v-7c0-0.553,0.447-1,1-1h8c0.553,0,1,0.447,1,1v7C29,31.553,28.553,32,28,32z M27,25h-6v5h6V25z"
                      fill-rule="evenodd"/></svg>

        </div>
    </div>
</div>


