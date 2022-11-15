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
                        <div id="mega-menu-dropdown" class="hidden grid  w-full">
                            <div
                                style="height: 400px;background-position: center bottom; background-size: cover;background-image: url('{{asset('img/menu-bg.jpg')}}')"
                                class="p-4 pb-0 col-span-2 md:pb-4 text-white col-span-1 md:col-span-2 border-r border-gray-700">
                            </div>
                            <div class="p-4 pb-0  md:pb-4 text-white col-span-1">
                                <img src="{{ asset('img/logo.png') }}" alt="BouTik" class="block mb-10 mt-4">
                                <ul class="space-y-4 ml-1">

                                    <li>
                                        <a href="{{ route('settings') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="1.5"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-settings">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path
                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                            </svg>
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://fruitsbytes.com">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:contact@anbapyezanman.com">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                            </svg>
                                            Contact Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/Fruitsbytes/Laravel-Moncash-Example/How To">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="1.5"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <circle cx="12" cy="12" r="4"></circle>
                                                <line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line>
                                                <line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line>
                                                <line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line>
                                                <line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line>
                                                <line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>
                                            </svg>
                                            Help Center
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://github.com/Fruitsbytes/Laravel-Moncash-Example/blob/main/LICENSE">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            License
                                        </a>
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
