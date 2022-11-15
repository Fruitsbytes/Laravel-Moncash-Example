<div class="container orders mx-auto py-3 px-2 " style="max-width: 900px">
    @vite('resources/css/card.scss')

    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-6xl text-gray-500 font-bold">Settings</h2>
            <p class="md:text-sm text-gray-600">Configure environment variables & more.</p>
        </div>
        <div></div>
    </div>


    <div class="card">
        <h3 class="mt-6 mb-4">i8ln</h3>
        <label for="lang" class="block mb-2 text-sm font-medium text-gray-400">Select Language</label>
        <select id="lang" style="width: 200px"
                class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500">
            <option selected>en</option>
            <option value="fr">FR</option>
            <option value="ht">HT</option>
        </select>


        <h3>Environment</h3>

        <label for="mode" class="block mb-2 text-sm font-medium text-gray-400">Select Language</label>
        <select disabled id="mode" style="width: 200px"
                class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500">
            <option selected>Sandbox</option>
            <option value="production">Production</option>
        </select>

        <form>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mt-6">
                    <label for="client_id" class="block mb-2 text-sm font-medium text-gray-300">Client ID</label>
                    <input type="text" id="client_id"
                           class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500"
                           placeholder="">
                </div>
                <div class="mt-6">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-300">Client Secret</label>
                    <input type="password" id="last_name" autocomplete="new-password"
                           class=" border border-gray-700 text-sm rounded-lg focus:ring-lime-500 focus:border-lime-500 block w-full p-2.5 bg-gray-800 border-gray-600 placeholder-gray-400 text-white focus:ring-lime-500 focus:border-lime-500"
                           placeholder="">
                </div>
            </div>
    </div>


    </form>
</div>
