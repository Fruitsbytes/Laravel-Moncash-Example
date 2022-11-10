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
                        <a href="{{ route('history') }}" class="link {{ Route::is('history') ? 'active' : '' }}">
                            History
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cart') }}" class="link {{ Route::is('cart') ? 'active' : '' }}">
                          <livewire:cart />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
