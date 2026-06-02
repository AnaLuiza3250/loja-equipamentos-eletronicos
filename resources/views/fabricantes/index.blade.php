<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Fabricantes') }}
            </h2>
            <a href="{{ route('fabricantes.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150 shadow-sm">
                + Novo Fabricante
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-950/40 text-green-800 dark:text-green-300 rounded-xl border border-green-200 dark:border-green-800/50 shadow-sm text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="overflow-x-auto">
                        <div class="w-full text-left">
                            {{-- Cabeçalho da Tabela --}}
                            <div class="flex border-b border-gray-100 dark:border-gray-700 pb-3 text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                                <div class="w-24 px-4">ID</div>
                                <div class="flex-1 px-4">Nome do Fabricante</div>
                                <div class="w-48 px-4">País de Origem</div>
                                <div class="w-44 px-4 text-right">Editar</div>
                                <div class="w-44 px-4 text-right">Deletar</div>
                            </div>
                            
                            {{-- Corpo da Tabela --}}
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse($fabricantes as $fabricante)
                                    <div class="flex items-center justify-between py-3 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition">
                                        <div class="text-sm font-mono text-gray-500 dark:text-gray-400 w-24 px-4">
                                            {{ $fabricante->id }}
                                        </div>
                                        <div class="text-sm font-semibold text-gray-700 dark:text-gray-200 flex-1 px-4">
                                            {{ $fabricante->nome }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 w-48 px-4">
                                             {{ $fabricante->pais }}
                                        </div>
                                        <div class="flex items-center justify-end gap-3 w-44 px-4">
                                            <a href="{{ route('fabricantes.edit', $fabricante->id) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 uppercase tracking-wider">
                                                Editar
                                            </a>
                                            
                                            <form action="{{ route('fabricantes.destroy', $fabricante->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este fabricante?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs font-bold text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 uppercase tracking-wider">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="py-8 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Nenhum fabricante cadastrado até o momento.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>