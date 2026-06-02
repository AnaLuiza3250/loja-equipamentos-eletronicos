<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Fabricante;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $tipos = Tipo::all();
        $fabricantes = Fabricante::all();
        return view('equipamentos.create', compact('tipos', 'fabricantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
 * Store a newly created resource in storage.
 */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validação dos dados
    $dadosValidados = $request->validate([
        'nome'                => 'required|string|max:255',
        'preco'               => 'required',
        'estoque'             => 'required|integer',
        'tipo_id'             => 'required|exists:tipos,id',
        'fabricante_id'       => 'required|exists:fabricantes,id',
        'detalhes'            => 'required|string',
        'image'               => 'nullable|image|max:2048',
        'processador'         => 'nullable|string|max:255',
        'memoria_ram'         => 'nullable|string|max:255',
        'armazenamento'       => 'nullable|string|max:255',
        'tamanho_tela'        => 'nullable|string|max:255',
        'resolucao_camera'    => 'nullable|string|max:255',
        'sistema_operacional' => 'nullable|string|max:255',
    ]);

    // 2. Upload da imagem
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('equipamentos', 'public');
    }

    // 3. Criação mapeando chave estrangeira correta e novas colunas
    Equipamento::create([
        'nome'                => $request->input('nome'),
        'preco'               => $request->input('preco'),
        'estoque'             => $request->input('estoque'),
        'detalhes'            => $request->input('detalhes'),
        'tipos_id'            => $request->input('tipo_id'),       // Mapeado do form para a coluna certa
        'fabricantes_id'      => $request->input('fabricante_id'),  // Mapeado do form para a coluna certa
        'image'               => $imagePath,
        'processador'         => $request->input('processador'),
        'memoria_ram'         => $request->input('memoria_ram'),
        'armazenamento'       => $request->input('armazenamento'),
        'tamanho_tela'        => $request->input('tamanho_tela'),
        'resolucao_camera'    => $request->input('resolucao_camera'),
        'sistema_operacional' => $request->input('sistema_operacional'),
    ]);

    return redirect()->route('equipamentos.index')->with('success', 'Equipamento salvo com sucesso!');
}
    /**
     * Display the specified resource.
     */
    public function show(Equipamento $equipamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipamento $equipamento){
        $tipos = Tipo::all();
        $fabricantes = Fabricante::all();

        return view('equipamentos.edit', [
            'equipamento' => $equipamento,
            'tipos'       => $tipos,
            'fabricantes' => $fabricantes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipamento $equipamento)
{
    // 1. Validando os dados
    $request->validate([
        'nome'                => 'required|string|max:255',
        'preco'               => 'required|numeric',
        'estoque'             => 'required|integer',
        'tipos_id'            => 'required|exists:tipos,id',
        'fabricantes_id'      => 'required|exists:fabricantes,id',
        'detalhes'            => 'required|string',
        'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'processador'         => 'nullable|string|max:255',
        'memoria_ram'         => 'nullable|string|max:255',
        'armazenamento'       => 'nullable|string|max:255',
        'tamanho_tela'        => 'nullable|string|max:255',
        'resolucao_camera'    => 'nullable|string|max:255',
        'sistema_operacional' => 'nullable|string|max:255',
    ]);

    // 2. Processa imagem
    $imagePath = $equipamento->image;
    if ($request->hasFile('image')) {
        if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
            Storage::disk('public')->delete($equipamento->image);
        }
        $imagePath = $request->file('image')->store('equipamentos', 'public');
    }

    // 3. Atualizando incluindo os novos campos técnicos
    $equipamento->update([
        'nome'                => $request->input('nome'),
        'fabricantes_id'      => $request->input('fabricantes_id'),
        'preco'               => $request->input('preco'),
        'estoque'             => $request->input('estoque'),
        'tipos_id'            => $request->input('tipos_id'),
        'detalhes'            => $request->input('detalhes'),
        'image'               => $imagePath,
        'processador'         => $request->input('processador'),
        'memoria_ram'         => $request->input('memoria_ram'),
        'armazenamento'       => $request->input('armazenamento'),
        'tamanho_tela'        => $request->input('tamanho_tela'),
        'resolucao_camera'    => $request->input('resolucao_camera'),
        'sistema_operacional' => $request->input('sistema_operacional'),
    ]);

    return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipamento $equipamento){
        $equipamento->delete();

        return redirect()->route('equipamentos.index');
    }

     public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
