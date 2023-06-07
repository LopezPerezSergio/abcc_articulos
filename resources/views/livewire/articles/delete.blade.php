<div class="p-4 w-full max-w-3xl h-full">
    <div class=" p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <form @if ($article) action="{{ route('articles.destroy', $article[0]->sku) }}" @endif
            method="POST">

            @csrf
            @method('DELETE')
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
                        @if ($article) @if ($article[0]->discontinued) @checked(true) @endif
                        @endif disabled
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
                <label for="family"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Familia</label>
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
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
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

                <button type="button" @if (!$article) disabled @endif data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Eliminar
                </button>
            </div>
            <div id="popup-modal" tabindex="-1" wire:ignore
                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Desae eliminar este articulo?</h3>
                            <button  type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Si, Eliminar
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
