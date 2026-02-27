<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comida;
use App\Models\TipoComida;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::with('tipoComida')->get();
        $tipos = TipoComida::all();

        return view('comidas.index', compact('comidas', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_comida' => 'required|max:100',
            'costo' => 'required|numeric',
            'detalle_comida' => 'required',
            'id_tipo_comida' => 'required'
        ]);

        Comida::create($request->all());

        return redirect()->route('comidas.index')
                         ->with('success', 'Comida creada correctamente');
    }

    public function destroy($id)
    {
        Comida::destroy($id);

        return redirect()->route('comidas.index')
                         ->with('success', 'Comida eliminada');
    }
}