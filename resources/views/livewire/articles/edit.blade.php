<div class="p-4 w-full max-w-3xl h-full">
    <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <form @if ($article) action="{{ route('articles.update', $sku) }}" @endif
            method="POST">
            @csrf
            @method('PUT')
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
                    <input id="discontinued" name="discontinued" type="checkbox" value="1" wire:click='upDiscontinued'
                        @if ($article) @if ($discontinued) @checked(true) @endif
                        @endif @if (!$article) disabled @endif
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
                <input type="text" name="article" id="article" @if (!$article) disabled @endif
                    value="@if ($article) {{ $article }} @endif"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Marca
                </label>
                <input type="text" name="brand" id="brand" @if (!$article) disabled @endif
                    value="@if ($article) {{ $brand }} @endif"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Modelo
                </label>
                <input type="text" name="model" id="model" @if (!$article) disabled @endif
                    value="@if ($article) {{ $model }} @endif"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="department"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                <select id="department" name="department" @if (!$article) disabled @endif wire:model='department'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option></option>
                    @forelse ($departments as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse
                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clase</label>
                <select id="category" name="category" @if (!$article) disabled @endif wire:model='category'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option></option>
                    @forelse ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse
                </select>
            </div>

            <div class="mb-4">
                <label for="family"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Familia</label>
                <select id="family" name="family" @if (!$article) disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @forelse ($families as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse
                </select>
            </div>

            <div class="grid gap-4 mb-4 grid-cols-2">
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="text" name="stock" id="stock" wire:model='stock'
                        @if (!$article) disabled @endif
                        value="@if ($article) {{ $stock }} @endif"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div>
                    <label for="quantity"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                    <input type="text" name="quantity" id="quantity" wire:model='quantity'
                        @if (!$article) disabled @endif
                        value="@if ($article) {{ $quantity }} @endif"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
            </div>

            <div class="grid gap-4 mb-4 grid-cols-2">
                <div>
                    <label for="date_high" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                        alta</label>
                    <input type="text" name="date_high" id="date_high" value="@if ($article) {{ $date_h }} @endif" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div>
                    <label for="date_low" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                        baja</label>
                    <input type="text" name="date_low" id="date_low" value="@if ($article) @if ( $discontinued ) {{ $date }} @endif @endif"
                        disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('articles.index') }}">
                    <button type="button"
                        class="mr-4 flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Regresar
                    </button>
                </a>

                <button type="submit" @if (!$article) disabled @endif
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Aceptar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
