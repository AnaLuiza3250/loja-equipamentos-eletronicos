<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Fabricante;
use Illuminate\Support\Facades\Storage;

class EquipamentoController extends Controller
{

    public function index(){
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    
    public function create(){
        $tipos = Tipo::all();
        $fabricantes = Fabricante::all();
        return view('equipamentos.create', compact('tipos', 'fabricantes'));
    }

   
    public function store(Request $request)
{
   
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

   
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('equipamentos', 'public');
    }

    
    Equipamento::create([
        'nome'                => $request->input('nome'),
        'preco'               => $request->input('preco'),
        'estoque'             => $request->input('estoque'),
        'detalhes'            => $request->input('detalhes'),
        'tipos_id'            => $request->input('tipo_id'),       
        'fabricantes_id'      => $request->input('fabricante_id'),  
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
    
    public function show(Equipamento $equipamento)
    {
        //
    }

    
    public function edit(Equipamento $equipamento){
        $tipos = Tipo::all();
        $fabricantes = Fabricante::all();

        return view('equipamentos.edit', [
            'equipamento' => $equipamento,
            'tipos'       => $tipos,
            'fabricantes' => $fabricantes
        ]);
    }

   
    public function update(Request $request, Equipamento $equipamento)
{
  
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

    
    $imagePath = $equipamento->image;
    if ($request->hasFile('image')) {
        if ($equipamento->image && Storage::disk('public')->exists($equipamento->image)) {
            Storage::disk('public')->delete($equipamento->image);
        }
        $imagePath = $request->file('image')->store('equipamentos', 'public');
    }

    
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


    public function destroy(Equipamento $equipamento){
        $equipamento->delete();

        return redirect()->route('equipamentos.index');
    }

     public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
