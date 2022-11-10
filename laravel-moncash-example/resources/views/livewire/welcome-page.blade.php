<div>
    <section class="bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Test the MonCash payment Flow</h1>

                <img src="{{ asset('img/MOnCashLaravelExample.jpg') }}" alt="MonCash Laravel Example" style="width: 200px"
                     class="border mx-auto border-0 mb-2">
                <p class="max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-400">
                    From checkout to payment, test the flow using MonCash on Laravel. Use this to help integrate the
                    REST API into your Laravel applications.</p>
                <a href="{{route('store')}}"
                   class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-lime-600 hover:bg-lime-700 focus:ring-4 focus:ring-lime-300 focus:ring-lime-800">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{route('history')}}"
                   class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center  border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 text-white border-gray-700 hover:bg-gray-700 focus:ring-gray-800">
                    View history
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{asset('img/fruitsBasket.jpg')}}" alt="basket">
            </div>
        </div>
    </section>

    <section id="buy">

    </section>

</div>

