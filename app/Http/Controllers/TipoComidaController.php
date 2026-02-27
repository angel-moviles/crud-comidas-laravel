<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoComida;

class TipoComidaController extends Controller
{
    public function index()
    {
        $tipos = TipoComida::all();
        return view('tipo_comidas.index', compact('tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required'
        ]);

        TipoComida::create($request->all());

        return redirect()->route('tipo_comidas.index')
                         ->with('success', 'Categoría creada correctamente');
    }

    public function destroy($id)
    {
        TipoComida::destroy($id);

        return redirect()->route('tipo_comidas.index')
                         ->with('success', 'Categoría eliminada');
    }
}