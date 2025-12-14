<?php

namespace App\Http\Controllers;

use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class TipoCultivoController extends Controller
{
    public function index(Request $request)
    {
        $query = TipoCultivo::query();

        // Buscador
        if ($request->has('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        // Filtrar por familia
        if ($request->has('familia') && $request->familia != '') {
            $query->where('familia', $request->familia);
        }

        // Filtrar por ciclo
        if ($request->has('ciclo') && $request->ciclo != '') {
            $query->where('ciclo', $request->ciclo);
        }

        $cultivos = $query->get();

        // Para mostrar las familias disponibles en el select
        $familias = TipoCultivo::select('familia')->distinct()->get();

        return view('tipo_cultivo.index', compact('cultivos', 'familias'));
    }

    public function create()
    {
        return view('tipo_cultivo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'familia' => 'nullable|string',
            'ciclo' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        TipoCultivo::create($request->all());

        return redirect()->route('cultivos.index')
            ->with('success', 'Tipo de cultivo creado correctamente');
    }

    public function edit(TipoCultivo $cultivo)
    {
        return view('tipo_cultivo.edit', compact('cultivo'));
    }

    public function update(Request $request, TipoCultivo $cultivo)
    {
        $request->validate([
            'nombre' => 'required|string',
            'familia' => 'nullable|string',
            'ciclo' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $cultivo->update($request->all());

        return back()->with('success', 'Tipo de cultivo actualizado');
    }

    public function destroy(TipoCultivo $cultivo)
    {
        $cultivo->delete();

        return back()->with('success', 'Tipo de cultivo eliminado');
    }

    //////////////////////////////api//////////////////////////////////////////////////

    public function apiGetTiposCultivo()
    {
        $tipos = TipoCultivo::all();
        return $tipos->toResourceCollection();
    }

}



