<div class="inline-flex relative items-center">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
    </svg>
    <span class="sr-only">Notifications</span>
    @if($number > 0)
        <div
            class="inline-flex absolute -top-3 -right-3 justify-center items-center h-5 text-xs p-1 text-red-100 text-white bg-orange-700 rounded-full border-2 border-gray-900">
            <small>{{$number}}</small>
        </div>
    @endif
</div>
