<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    public function index()
    {
        $fabricantes = Fabricante::all();
        return view('fabricantes.index', compact('fabricantes'));
    }

    public function create()
    {
        return view('fabricantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:fabricantes,nome',
            'pais' => 'required|string|max:255', // Validação do País
        ], [
            'nome.required' => 'O nome do fabricante é obrigatório.',
            'nome.unique'   => 'Este fabricante já está cadastrado.',
            'pais.required' => 'O país de origem é obrigatório.',
        ]);

        Fabricante::create([
            'nome' => $request->input('nome'),
            'pais' => $request->input('pais'), // Salvando no banco
        ]);

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante cadastrado com sucesso!');
    }

    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.edit', compact('fabricante'));
    }

    public function update(Request $request, Fabricante $fabricante)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:fabricantes,nome,' . $fabricante->id,
            'pais' => 'required|string|max:255', // Validação do País
        ], [
            'nome.required' => 'O nome do fabricante é obrigatório.',
            'nome.unique'   => 'Este fabricante já está cadastrado.',
            'pais.required' => 'O país de origem é obrigatório.',
        ]);

        $fabricante->update([
            'nome' => $request->input('nome'),
            'pais' => $request->input('pais'), // Atualizando no banco
        ]);

        return redirect()->route('fabricantes.index')->with('success', 'Fabricante atualizado com sucesso!');
    }

    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();
        return redirect()->route('fabricantes.index')->with('success', 'Fabricante removido com sucesso!');
    }
}