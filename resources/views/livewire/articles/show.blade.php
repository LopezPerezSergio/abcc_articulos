<div class="p-4 w-full max-w-3xl h-full">
    <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div>
                <label for="sku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU
                    @if (!$article && $sku != '')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Sku no
                                registrado</p>
                    @endif
                </label>
                <input type="number" name="sku" id="sku" wire:model='sku'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="flex items-center mb-2 pt-7 flex justify-end">
                <input id="discontinued" name="discontinued" type="checkbox"
                    @if ($article) @if ($article[0]->discontinued ) @checked(true) @endif @endif disabled
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="discontinued"
                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descontinuado 
                </label>
            </div>

        </div>

        <div class="mb-4">
            <label for="article" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Articulo
            </label>
            <input type="text" name="article" id="article" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                required="" value="@if ($article) {{ $article[0]->article }} @endif">
        </div>

        <div class="mb-4">
            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Marca
            </label>
            <input type="text" name="brand" id="brand" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                required="" value="@if ($article) {{ $article[0]->brand }} @endif">
        </div>

        <div class="mb-4">
            <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Modelo
            </label>
            <input type="text" name="model" id="model" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                required="" value="@if ($article) {{ $article[0]->model }} @endif">
        </div>

        <div class="mb-4">
            <label for="department"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
            <select id="department" name="department" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @if ($department)
                    <option selected="">{{ $department[0]->name }}</option>
                @else
                    <option selected=""></option>
                @endif
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clase</label>
            <select id="category" name="category" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @if ($category)
                    <option selected="">{{ $category[0]->name }}</option>
                @else
                    <option selected=""></option>
                @endif
            </select>
        </div>

        <div class="mb-4">
            <label for="family" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Familia</label>
            <select id="family" name="family" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @if ($family)
                    <option selected="">{{ $family[0]->name }}</option>
                @else
                    <option selected=""></option>
                @endif
            </select>
        </div>

        <div class="grid gap-4 mb-4 grid-cols-2">
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                <input type="text" name="stock" id="stock" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="" value="@if ($article) {{ $article[0]->stock }} @endif">
            </div>
            <div>
                <label for="quantity"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                <input type="text" name="quantity" id="quantity" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="" value="@if ($article) {{ $article[0]->quantity }} @endif">
            </div>
        </div>

        <div class="grid gap-4 mb-4 grid-cols-2">
            <div>
                <label for="date_high" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                    alta</label>
                <input type="text" name="date_high" id="date_high" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="" value="@if ($article) {{ $article[0]->date_high }} @endif">
            </div>
            <div>
                <label for="date_low" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                    baja</label>
                <input type="text" name="date_low" id="date_low" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="" value="@if ($article) @if ($article[0]->discontinued ) {{ $article[0]->date_low }} @endif @endif">
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('articles.index') }}">
                <button type="button"
                class="mr-4 flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Regresar
            </button>
            </a>
        </div>
    </div>
</div>
