<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use Illuminate\Http\Request;

class FincaController extends Controller
{

    public function index()
    {
        $fincas = auth()->user()->fincas;
        return view('fincas.index', compact('fincas'));
    }

    public function create()
    {
        return view('fincas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'hectareas_totales' => 'required|numeric|min:0',
            'descripcion' => 'nullable'
        ]);

        auth()->user()->fincas()->create($request->all());

        return redirect()->route('fincas.index')->with('success', 'Finca creada correctamente');
    }

    public function show(Finca $finca)
    {
        $this->authorizeAccess($finca);
        return view('fincas.show', compact('finca'));
    }

    public function edit(Finca $finca)
    {
        $this->authorizeAccess($finca);
        return view('fincas.edit', compact('finca'));
    }

    public function update(Request $request, Finca $finca)
    {
        $this->authorizeAccess($finca);

        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'hectareas_totales' => 'required|numeric|min:0',
            'descripcion' => 'nullable'
        ]);

        $finca->update($request->all());

        return redirect()->route('fincas.index')->with('success', 'Finca actualizada correctamente');
    }

    public function destroy(Finca $finca)
    {
        $this->authorizeAccess($finca);
        $finca->delete();
        return redirect()->route('fincas.index')->with('success', 'Finca eliminada');
    }

    private function authorizeAccess(Finca $finca)
    {
        if ($finca->user_id !== auth()->id()) {
            abort(403, 'No tienes permiso para acceder a esta finca.');
        }
    }



    /*********************************************API********************************************/

    /**
     * GET /api/v1/fincas
     * Lista las fincas del usuario autenticado
     */
    public function apiIndex(Request $request)
    {
        $fincas = Finca::where('user_id', $request->user()->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $fincas
        ]);
    }

    /**
     * GET /api/v1/fincas/{id}
     * Devuelve una finca si pertenece al usuario
     */
    public function apiShow(Request $request, $id)
    {
        $finca = Finca::findOrFail($id);

        if ($finca->user_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        return response()->json([
            'status' => 'success',
            'data' => $finca
        ]);
    }

    /**
     * POST /api/v1/fincas
     * Crea una finca nueva perteneciente al usuario
     */
    public function apiStore(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'hectareas_totales' => 'required|numeric|min:0',
            'descripcion' => 'nullable'
        ]);

        $validated['user_id'] = $request->user()->id;

        $finca = Finca::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Finca creada correctamente',
            'data' => $finca
        ], 201);
    }

    /**
     * PUT /api/v1/fincas/{id}
     * Actualiza una finca
     */
    public function apiUpdate(Request $request, $id)
    {
        $finca = Finca::findOrFail($id);

        if ($finca->user_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $validated = $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'hectareas_totales' => 'required|numeric|min:0',
            'descripcion' => 'nullable'
        ]);

        $finca->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Finca actualizada correctamente',
            'data' => $finca
        ]);
    }

    /**
     * DELETE /api/v1/fincas/{id}
     * Elimina una finca
     */
    public function apiDestroy(Request $request, $id)
    {
        $finca = Finca::findOrFail($id);

        if ($finca->user_id !== $request->user()->id) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        $finca->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Finca eliminada'
        ]);
    }
}
