@extends('layouts.index')

@section('content')
    <div
        class="relative flex items-top justify-center flex-grow bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <section class="bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                        <div class="mx-auto max-w-screen-sm text-center">
                            <img src="{{asset('img/mangoxx.jpg')}}" alt="error-fruit" class="block mx-auto mb-4" style="width: 150px">
                            <h1 class="mb-4 text-6xl tracking-tight font-extrabold lg:text-8xl text-orange-700">@yield('code')</h1>
                            <p class="mb-4 text-3xl tracking-tight font-bold md:text-4xl text-white">Something's wrong.</p>
                            <p class="mb-4 text-lg font-light text-gray-400">@yield('message') </p>
                            <a href="{{ route('welcome') }}" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-900 my-4">Back to Homepage</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
