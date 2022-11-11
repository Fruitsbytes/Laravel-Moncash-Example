@php


if(session()->has('name')){
    $name = session()->get('name');
}else{
    $name = fake('fr-FR')->firstName ?? 'Jean';
    session()->put('name', $name);
}


@endphp

@vite('resources/css/header.scss')

<header class="header">
    <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 rounded bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <img src="{{asset('img/logo.jpg')}}" class="mr-3 h-6 sm:h-9" alt="BouTik Logo"/>
            </a>
            <div class="flex-grow"></div>
            <button data-collapse-toggle="navbar-default" type="button"
                    class="button"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="links">
                    <li style="line-height: 1">

                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown">
                            <div class="text-left">
                                <small class="text-green-300">Hello, {{ $name }}</small>
                                <p class="m-0"><b>Account & Settings</b></p>
                            </div>

                            <svg aria-hidden="true" class="ml-1 w-5 h-5 md:w-4 md:h-4" fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown" class="grid hidden absolute z-20 grid-cols-2 w-auto">
                            <div
                                class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white col-span-1 md:col-span-2 border-r border-gray-700">
                                <img src="{{ asset('img/logo.png')  }}"
                                     alt="" class="block w-full py-5 mr-4 drop-shadow-lg" style="max-width: 220px;min-height: 80px">
                            </div>
                            <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                <ul class="space-y-4 ml-4">
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('settings') }}">Settings 🔥</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-4 text-gray-900 dark:text-white">
                                <ul class="space-y-4">
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Help Center</a>
                                    </li>
                                    <li>
                                        <a href="#">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('welcome') }}" class="link {{ Route::is('welcome') ? 'active' : '' }}"
                           aria-current="page">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('store') }}" class="link {{ Route::is('store') ? 'active' : '' }}">
                            Store
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders') }}" class="link {{ Route::is('orders') ? 'active' : '' }}">
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="link {{ Route::is('cart') ? 'active' : '' }}">
                            <livewire:cart/>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
