<div class="p-4 w-full max-w-3xl h-full">
    <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div>
                    <label for="sku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU
                        @if ($article)
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Sku ya
                                    registrado</p>
                        @endif
                    </label>
                    <input type="number" name="sku" id="sku" wire:model='sku'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>

            </div>

            <div class="mb-4">
                <label for="article" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Articulo
                </label>
                <input type="text" name="article" id="article" @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Marca
                </label>
                <input type="text" name="brand" id="brand" @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Modelo
                </label>
                <input type="text" name="model" id="model" @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>

            <div class="mb-4">
                <label for="department"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departamento</label>
                <select id="department" name="department" wire:model='department'
                    @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected=""></option>
                    @forelse ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse

                </select>
            </div>

            <div class="mb-4">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clase</label>
                <select id="category" name="category" wire:model='category'
                    @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected=""></option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse
                </select>
            </div>

            <div class="mb-4">
                <label for="family"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Familia</label>
                <select id="family" name="family" @if ($article || $sku == '') disabled @endif
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected=""></option>
                    @forelse ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @empty
                        <option selected=""></option>
                    @endforelse
                </select>
            </div>

            <div class="grid gap-4 mb-4 grid-cols-2">
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" id="stock" wire:model='stock'
                        @if ($article || $sku == '') disabled @endif
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div>
                    <label for="quantity"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                    <input type="number" name="quantity" id="quantity" wire:model='quantity'
                        @if ($article || $sku == '') disabled @endif
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
            </div>

            <div class="grid gap-4 mb-4 grid-cols-2">
                <div>
                    <label for="date_high" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                        alta</label>
                    <input type="date" name="date_high" id="date_high" value="{{ $date }}" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="">
                </div>
                <div>
                    <label for="date_low" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                        baja</label>
                    <input type="date" name="date_low" id="date_low" value="{{ $date }}" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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

                <button type="submit" @if ($article || $sku == '') disabled @endif
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Agregar
                </button>
            </div>
        </form>
    </div>
</div>
