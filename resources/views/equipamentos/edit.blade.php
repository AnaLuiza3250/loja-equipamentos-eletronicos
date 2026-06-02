<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Equipamento') }} 
        </h2>
    </x-slot>
 
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('equipamentos.update', $equipamento) }}" enctype="multipart/form-data" class="space-y-6"> 
                        @csrf 
                        @method('PUT')
                   
                        {{-- Linha 1: Nome do Equipamento --}}
                        <div>
                            <label for="nome" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Nome do Equipamento:
                            </label>
                            <input type="text" name="nome" id="nome" value="{{ $equipamento->nome }}" required
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                        </div>

                        {{-- Linha 2: Preço e Estoque no mesmo nível --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="preco" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Preço:
                                </label>
                                <input type="text" name="preco" id="preco" value="{{ $equipamento->preco }}" required
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            <div>
                                <label for="estoque" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Quantidade no Estoque:
                                </label>
                                <input type="number" name="estoque" id="estoque" value="{{ $equipamento->estoque }}" required
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>
                        </div>

                        {{-- Linha 3: Tipo e Fabricante --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="tipos_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Tipo:
                                </label>
                                <select name="tipos_id" id="tipos_id" required 
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                                    <option value="">Selecione um tipo</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ $equipamento->tipos_id == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->equipamento }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div>
                                <label for="fabricantes_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Fabricante:
                                </label>
                                <select name="fabricantes_id" id="fabricantes_id" required 
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                                    <option value="">Selecione um fabricante</option>
                                    @foreach($fabricantes as $fabricante)
                                        <option value="{{ $fabricante->id }}" {{ $equipamento->fabricantes_id == $fabricante->id ? 'selected' : '' }}>
                                            {{ $fabricante->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700 my-2">
                        <p class="text-sm font-extrabold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">Especificações Técnicas</p>

                        {{-- GRID DAS NOVAS ESPECIFICAÇÕES TÉCNICAS --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            {{-- Processador --}}
                            <div>
                                <label for="processador" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Processador:
                                </label>
                                <input type="text" name="processador" id="processador" value="{{ $equipamento->processador }}" placeholder="Ex: Intel i5, Snapdragon 8 Gen 2"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            {{-- Memória RAM --}}
                            <div>
                                <label for="memoria_ram" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Memória RAM:
                                </label>
                                <input type="text" name="memoria_ram" id="memoria_ram" value="{{ $equipamento->memoria_ram }}" placeholder="Ex: 8GB, 16GB LPDDR5"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            {{-- Armazenamento --}}
                            <div>
                                <label for="armazenamento" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Armazenamento:
                                </label>
                                <input type="text" name="armazenamento" id="armazenamento" value="{{ $equipamento->armazenamento }}" placeholder="Ex: SSD 512GB, 128GB UFS 3.1"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            {{-- Tamanho da Tela --}}
                            <div>
                                <label for="tamanho_tela" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Tamanho da Tela:
                                </label>
                                <input type="text" name="tamanho_tela" id="tamanho_tela" value="{{ $equipamento->tamanho_tela }}" placeholder="Ex: 15.6\", 6.1\" OLED"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            {{-- Resolução da Câmera --}}
                            <div>
                                <label for="resolucao_camera" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Resolução da Câmera:
                                </label>
                                <input type="text" name="resolucao_camera" id="resolucao_camera" value="{{ $equipamento->resolucao_camera }}" placeholder="Ex: 50MP + 12MP, Webcam 1080p"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>

                            {{-- Sistema Operacional --}}
                            <div>
                                <label for="sistema_operacional" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Sistema Operacional:
                                </label>
                                <input type="text" name="sistema_operacional" id="sistema_operacional" value="{{ $equipamento->sistema_operacional }}" placeholder="Ex: Windows 11, Android 14, iOS"
                                    class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700 my-2">

                        {{-- Detalhes Gerais --}}
                        <div>
                            <label for="detalhes" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Detalhes / Descrição Adicional:
                            </label>
                            <input type="text" name="detalhes" id="detalhes" value="{{ $equipamento->detalhes }}" 
                                class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl shadow-sm w-full px-4 py-2.5 text-sm transition duration-150">
                        </div>

                        {{-- INPUT DE IMAGEM --}}
                        <div class="border-t border-gray-100 dark:border-gray-700/60 pt-4">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Imagem do Equipamento:
                            </label>

                            {{-- Mostrar imagem atual --}}
                            @if($equipamento->image)
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Imagem cadastrada atualmente:</p>
                                    <img src="{{ asset('storage/' . $equipamento->image) }}" alt="{{ $equipamento->nome }}" class="max-h-40 rounded-xl object-cover shadow-sm border border-gray-200 dark:border-gray-700">
                                </div>
                            @endif

                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" 
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-bold
                                    file:bg-indigo-50 file:text-indigo-700
                                    dark:file:bg-gray-700 dark:file:text-gray-200
                                    hover:file:bg-indigo-100 dark:hover:file:bg-gray-600 transition duration-150"> 
                            </div>
                            <p class="mt-1.5 text-xs text-gray-400 dark:text-gray-500">PNG, JPG, GIF até 2MB (Deixe vazio caso não queira alterar a foto atual)</p>
                            
                            {{-- Preview da nova imagem --}}
                            <div id="preview-container" class="mt-4 hidden">
                                <p class="text-xs text-indigo-600 dark:text-indigo-400 mb-2 font-bold">Nova imagem selecionada:</p>
                                <img id="preview" class="max-h-64 rounded-xl shadow-md border border-indigo-200" alt="Preview">
                            </div>
                        </div>

                        {{-- Botão de Ação --}}
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-700/60 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold text-xs uppercase tracking-widest active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md shadow-indigo-200 dark:shadow-none">
                                 Atualizar Equipamento
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Sistema de Preview Refatorado
        const fileInput = document.getElementById('image');
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>