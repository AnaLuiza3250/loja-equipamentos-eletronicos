<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipamentos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Nessa parte do alerta pedi ajuda à IA --}}
            
            @php
                $itensCriticos = $equipamentos->where('estoque', '<=', 5);
            @endphp

            @if($itensCriticos->count() > 0)
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl dark:bg-red-950/40 dark:border-red-600 shadow-sm">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <svg class="h-5 w-5 text-red-600 dark:text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-bold text-red-800 dark:text-red-200">
                                Atenção: Há produtos com estoque crítico!
                            </h3>
                            <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach($itensCriticos as $item)
                                        <li>
                                            O produto <strong>{{ $item->nome }}</strong> está com apenas 
                                            <span class="font-bold underline">{{ $item->estoque }}</span> {{ $item->estoque == 1 ? 'unidade' : 'unidades' }} em estoque.
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 border-b border-gray-200 dark:border-gray-700 pb-5">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">Painel de Equipamentos</h3>
                </div>
                
                <div class="flex-shrink-0">
                    <a href="{{ route('equipamentos.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-purple-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-indigo-200 dark:shadow-none whitespace-nowrap">
                        Novo Equipamento
                    </a>
                </div>
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($equipamentos as $equipamento)
                    <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700/60 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 flex flex-col group">
                        
                       
                        <div class="relative bg-gray-100 dark:bg-gray-900 aspect-[4/3] w-full overflow-hidden border-b border-gray-100 dark:border-gray-700/50 flex items-center justify-center">
                            @if($equipamento->image)
                                <img src="{{ asset('storage/' . $equipamento->image) }}" alt="{{ $equipamento->nome }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="flex flex-col items-center gap-2 text-gray-400 dark:text-gray-500">
                                    <svg class="w-10 h-10 stroke-current" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-xs font-medium">Nenhuma foto</span>
                                </div>
                            @endif
                        </div>

                        
                        <div class="p-5 flex-1 flex flex-col">
                            
                            <div class="flex gap-2 items-center text-xs font-semibold text-indigo-600 dark:text-indigo-400 mb-1.5 uppercase tracking-wider">
                                <span>{{ $equipamento->tipo->equipamento ?? 'Dispositivo' }}</span>
                                <span class="text-gray-300 dark:text-gray-600">•</span>
                                <span class="text-gray-600 dark:text-gray-300">{{ $equipamento->fabricante->nome ?? 'S/F' }}</span>
                            </div>

                            
                            <h4 class="text-base font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                {{ $equipamento->nome }}
                            </h4>
<br>
                        
                            <div class="flex items-center justify-between gap-2 mt-2 mb-3">
                                
                                </span>

                                <div>
                                    @if($equipamento->estoque <= 5)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold bg-red-100 text-red-800 dark:bg-red-950/60 dark:text-red-300 animate-pulse">
                                             Crítico: {{ $equipamento->estoque }} un
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold bg-green-100 text-green-800 dark:bg-green-950/60 dark:text-green-300">
                                             Estoque: {{ $equipamento->estoque }} un
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <br>

                            
                            <div class="bg-gray-50/70 dark:bg-gray-900/40 border border-gray-100 dark:border-gray-700/40 rounded-xl p-3 mb-3 text-[11px] space-y-1.5">
                                @if($equipamento->processador)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Processador:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->processador }}</span></div>
                                @endif
                                @if($equipamento->memoria_ram)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Memória RAM:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->memoria_ram }}</span></div>
                                @endif
                                @if($equipamento->armazenamento)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Armazenamento:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->armazenamento }}</span></div>
                                @endif
                                @if($equipamento->tamanho_tela)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Tela:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->tamanho_tela }}</span></div>
                                @endif
                                @if($equipamento->resolucao_camera)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Câmera:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->resolucao_camera }}</span></div>
                                @endif
                                @if($equipamento->sistema_operacional)
                                    <div class="flex justify-between"><span class="text-gray-400 dark:text-gray-500">Sist. Operacional:</span> <span class="font-medium text-gray-700 dark:text-gray-300">{{ $equipamento->sistema_operacional }}</span></div>
                                @endif
                            </div>

                            <br>

                           
                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-2 mb-4 flex-1">
                                {{ $equipamento->detalhes }}
                            </p>

                            
                            <div class="pt-3 border-t border-gray-100 dark:border-gray-700/50 flex items-baseline justify-between mb-4">
                                <span class="text-xs text-gray-400 dark:text-gray-500 font-medium">Preço Unitário</span>
                                <span class="text-lg font-black text-gray-900 dark:text-gray-100">
                                    R$ {{ number_format($equipamento->preco, 2, ',', '.') }}
                                </span>
                            </div>

                            
                            <div class="grid grid-cols-2 gap-2.5 pt-1">
                                <a href="{{ route('equipamentos.edit', $equipamento) }}" class="inline-flex items-center justify-center px-3 py-2 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700/50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-600 rounded-xl text-xs font-bold transition duration-150">
                                     Editar
                                </a>
                                
                                <form method="POST" action="{{ route('equipamentos.destroy', $equipamento) }}" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir o equipamento {{ $equipamento->nome }}?')" class="w-full inline-flex items-center justify-center px-3 py-2 bg-red-50 hover:bg-red-100 dark:bg-red-950/20 dark:hover:bg-red-950/40 text-red-600 dark:text-red-400 border border-red-100 dark:border-red-900/30 rounded-xl text-xs font-bold transition duration-150">
                                         Excluir
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>