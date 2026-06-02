<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    
    public function create()
    {
        return view('tipos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'equipamento' => 'required|string|max:255|unique:tipos,equipamento',
        ], [
            'equipamento.required' => 'O nome do tipo/categoria é obrigatório.',
            'equipamento.unique'   => 'Este tipo de equipamento já está cadastrado.',
        ]);

        Tipo::create([
            'equipamento' => $request->input('equipamento'),
        ]);

        return redirect()->route('tipos.index')->with('success', 'Tipo de equipamento cadastrado com sucesso!');
    }

    
    public function edit(Tipo $tipo)
    {
        return view('tipos.edit', compact('tipo'));
    }

    
    public function update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'equipamento' => 'required|string|max:255|unique:tipos,equipamento,' . $tipo->id,
        ], [
            'equipamento.required' => 'O nome do tipo/categoria é obrigatório.',
            'equipamento.unique'   => 'Este tipo de equipamento já está cadastrado.',
        ]);

        $tipo->update([
            'equipamento' => $request->input('equipamento'),
        ]);

        return redirect()->route('tipos.index')->with('success', 'Tipo de equipamento atualizado com sucesso!');
    }

    
    public function destroy(Tipo $tipo)
    {
        $tipo->delete();
        return redirect()->route('tipos.index')->with('success', 'Tipo de equipamento removido com sucesso!');
    }
}