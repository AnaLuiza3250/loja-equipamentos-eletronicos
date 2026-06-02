<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Fabricante') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('fabricantes.update', $fabricante->id) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome do Fabricante:</label>
                            <input type="text" name="nome" id="nome" required value="{{ old('nome', $fabricante->nome) }}" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            @error('nome')
                                <p class="mt-1 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pais" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">País de Origem:</label>
                            <input type="text" name="pais" id="pais" required value="{{ old('pais', $fabricante->pais) }}" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            @error('pais')
                                <p class="mt-1 text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2 flex items-center gap-3">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                Atualizar Fabricante
                            </button>
                            <a href="{{ route('fabricantes.index') }}" class="inline-flex items-center px-4 py-2 bg-purple dark:bg-purple-700 border border-gray-300 dark:border-purple-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>