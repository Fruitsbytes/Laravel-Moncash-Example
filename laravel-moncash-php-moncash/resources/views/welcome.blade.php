<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel + PHPMoncash</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            @apply bg-gray-800
        }
    </style>
    @vite('resources/css/app.css')
</head>
@php
    use Fruitsbytes\PHP\MonCash\API\Client;
    use Fruitsbytes\PHP\MonCash\API\Order;
    use  Fruitsbytes\PHP\MonCash\Button\ButtonStyleRedResponsive;
    $buttonConfig = [
     true, // border
     'em', //  lang
     true, // animate on  hover,
     48 // height
    ];
    $order = new Order(100);
    $button = new ButtonStyleRedResponsive( $order, [
                            'clientSecret'     => config('moncash.clientSecret'),
                            'clientId'         => config('moncash.clientId'),
                        ], ...$buttonConfig);

@endphp
<body class="antialiased">
<div class="relative flex justify-center flex-col text-green-50  min-h-screen bg-gray-800 items-center py-4 sm:pt-0">
    <h1 class="text-6xl text-green-400 absolute top-1 left-1 font-light font-sans">Mwen vinn achte!</h1>
    <div class="bg-gray-900 shadow hover:shadow-lg rounded-lg p-4" style="min-width: 400px; min-height: 400px">
        <img src="{{asset('images/melon.png')}}" class="block mx-auto w-full" style="max-width: 300px">
        <h2 class="text-lg font-bold flex justify-between items-baseline pt-2 mt-2 border-t border-gray-700">
            Bèl melon frans
            <bold class="font-mono text-2xl text-orange-400 rounded-full p-4 py-1 border border-gray-800">100.00 HTG
            </bold>
        </h2>
        <p class="text-xs text-gray-600 mt-2 mb-4" style="max-width: 380px; line-height: 1">
            A Charentais melon is a type of French cantaloupe, Cucumis melo var. cantalupensis. It is a small variety of
            melon, around the size of a softball. It has flesh similar to most cantaloupes, but with a distinct and more
            intense aroma, and a more pink hue. Wikipedia
        </p>

        {{ $button->render()}}


    </div>
</div>
</body>
</html>
