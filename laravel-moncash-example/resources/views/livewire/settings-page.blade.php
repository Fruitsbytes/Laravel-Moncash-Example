<div class="container orders mx-auto py-3 px-2 " style="max-width: 900px">
    @vite(['resources/css/card.scss', 'resources/css/button.scss'])

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-6xl text-gray-500 font-bold">Settings</h2>
            <p class="md:text-sm text-gray-600">Configure environment variables & more.</p>
        </div>
        <div></div>
    </div>


    <div class="card">
        <form method="POST">
            <fieldset>
                <div class="button-group">
                    <button disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-save">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Save
                    </button>
                    <button disabled>
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                  d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                        </svg>
                        Default
                    </button>
                </div>
                <h3 class="mt-6 mb-4">i8ln</h3>
                <label for="lang" class="block mb-2 text-sm font-medium text-gray-400">Select Language</label>
                <select id="lang" style="width: 200px"
                        class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500">
                    <option selected value="en">English</option>
                    <option value="fr">Français</option>
                    <option value="ht">Kreyòl Ayisyen</option>
                </select>


                <h3>Environment</h3>

                <label for="mode" class="block mb-2 text-sm font-medium text-gray-400">Select Language</label>
                <select disabled id="mode" style="width: 200px"
                        class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500">
                    <option selected>Sandbox</option>
                    <option value="production">Production</option>
                </select>


                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div class="mt-6">
                        <label for="client_id" class="block mb-2 text-sm font-medium text-gray-300">Client ID</label>
                        <input type="text" id="client_id"
                               class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500"
                               placeholder="">
                    </div>
                    <div class="mt-6">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-300">Client
                            Secret</label>
                        <input type="password" id="last_name" autocomplete="new-password"
                               class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500"
                               placeholder="">
                    </div>
                </div>

            </fieldset>
        </form>
    </div>


</div>
