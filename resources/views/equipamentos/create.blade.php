<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Equipamento') }} 
        </h2>
    </x-slot>
 
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('equipamentos.store') }}" enctype="multipart/form-data" class="space-y-6"> 
                        @csrf 
                   
                        {{-- Nome do Equipamento --}}
                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome do Equipamento:</label>
                            <input type="text" name="nome" id="nome" required value="{{ old('nome') }}" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                        </div>

                        {{-- Preço e Estoque --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="preco" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Preço (R$):</label>
                                <input type="number" name="preco" id="preco" step="0.01" required value="{{ old('preco') }}" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                            </div>

                            <div>
                                <label for="estoque" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Quantidade em Estoque:</label>
                                <input type="number" name="estoque" id="estoque" required value="{{ old('estoque') }}" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                            </div>
                        </div>

                        {{-- Tipo e Fabricante --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="tipo_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipo:</label>
                                <select name="tipo_id" id="tipo_id" required class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                    <option value="">Selecione um tipo</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ old('tipo_id') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->equipamento }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="fabricante_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fabricante:</label>
                                <select name="fabricante_id" id="fabricante_id" required class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                    <option value="">Selecione um fabricante</option>
                                    @foreach($fabricantes as $fabricante)
                                        <option value="{{ $fabricante->id }}" {{ old('fabricante_id') == $fabricante->id ? 'selected' : '' }}>
                                            {{ $fabricante->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700 my-6">

                        {{-- SEÇÃO NOVA: ESPECIFICAÇÕES TÉCNICAS (Ficha Técnica) --}}
                        <div>
                            <h3 class="text-sm font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider mb-4">⚙️ Especificações Técnicas (Ficha Técnica)</h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="processador" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Processador:</label>
                                    <input type="text" name="processador" id="processador" value="{{ old('processador') }}" placeholder="Ex: Intel i5, Snapdragon 8 Gen 2" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>

                                <div>
                                    <label for="memoria_ram" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Memória RAM:</label>
                                    <input type="text" name="memoria_ram" id="memoria_ram" value="{{ old('memoria_ram') }}" placeholder="Ex: 8GB DDR4, 16GB" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>

                                <div>
                                    <label for="armazenamento" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Armazenamento:</label>
                                    <input type="text" name="armazenamento" id="armazenamento" value="{{ old('armazenamento') }}" placeholder="Ex: SSD 512GB, 128GB eMMC" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>

                                <div>
                                    <label for="tamanho_tela" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tamanho da Tela:</label>
                                    <input type="text" name="tamanho_tela" id="tamanho_tela" value="{{ old('tamanho_tela') }}" placeholder="Ex: 15.6\", 6.1\"" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>

                                <div>
                                    <label for="resolucao_camera" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Câmera:</label>
                                    <input type="text" name="resolucao_camera" id="resolucao_camera" value="{{ old('resolucao_camera') }}" placeholder="Ex: 48 MP Triple, Não possui" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>

                                <div>
                                    <label for="sistema_operacional" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Sistema Operacional:</label>
                                    <input type="text" name="sistema_operacional" id="sistema_operacional" value="{{ old('sistema_operacional') }}" placeholder="Ex: Windows 11, Android 13" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"> 
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700 my-6">

                        {{-- Descrição Geral / Observações --}}
                        <div>
                            <label for="detalhes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Observações / Detalhes Adicionais:</label>
                            <textarea name="detalhes" id="detalhes" rows="3" required class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">{{ old('detalhes') }}</textarea>
                        </div>

                        {{-- Upload da Imagem com Preview --}}
                        <div>
                            <div class="mt-2 mb-2">
                                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagem do Equipamento:</label>
                            </div>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="image" id="image" accept="image/*" class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300"> 
                            </div>
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF até 2MB</p>
                            
                            <img id="preview" class="mt-4 max-h-64 rounded-lg shadow-md border border-gray-200 dark:border-gray-700" style="display:none;" alt="Preview">
                        </div>

                        {{-- Botão Salvar --}}
                        <div class="pt-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                Salvar Equipamento
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Script de Preview --}}
    <script>
        const fileInput = document.getElementById('image');
        const preview = document.getElementById('preview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>