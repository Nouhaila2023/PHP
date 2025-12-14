<?php

namespace App\Http\Controllers;
use App\Models\Parcela;
use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{

    public function index($id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $parcelas = $finca->parcelas()->paginate(6);
        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas' , 'tipoCultivos'));

    }

    public function create($id) {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $tipoCultivos = TipoCultivo::all();

        return view('parcelas.new' , compact('finca', 'tipoCultivos'));
    }

    public function store(Request $request , $id)
    {
        $nombre = $request->input('nombre');
        $hectareas = $request->input('hectareas');
        $fecha_siembra = $request->input('fecha_siembra');
        $estado = $request->input('estado');
        $notas = $request->input('notas');
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'hectareas' => 'required|numeric|min:0',
            'tipo_cultivo_id' => 'required|exists:tipo_cultivos,id',
            'fecha_siembra' => 'required|date',
            'estado' => 'required|in:en_cultivo,en_descanso,preparacion',
            'notas' => 'required|string'
        ]);
        Parcela::create([
            'nombre' => $nombre,
            'finca_id' =>$finca->id ,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $hectareas,
            'fecha_siembra' => $fecha_siembra,
            'estado' => $estado,
            'notas' => $notas,
        ]);

        return redirect()->route('mis_parcelas', ['finca' => $finca->id]);

    }

    public function  destroy($idFinca , $idParcela)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($idFinca);
        $parcela = $finca->parcelas()->findOrFail($idParcela);
        $parcela->delete();
        return redirect()->route('mis_parcelas',['finca'=>$finca->id]);
    }

    public function edit($idFinca , $idParcela)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($idFinca);
        $parcela = $finca->parcelas()->findOrFail($idParcela);
        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.edit', compact('finca' , 'parcela' , 'tipoCultivos'));
    }


    public function update(Request $request,  $idFinca , $idParcela)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($idFinca);
        $parcela = $finca->parcelas()->findOrFail($idParcela);
        $nombre = $request->input('nombre');
        $hectareas = $request->input('hectareas');
        $fecha_siembra = $request->input('fecha_siembra');
        $estado = $request->input('estado');
        $notas = $request->input('notas');
        $request->validate([
            'nombre' => 'required|string|max:255',
            'hectareas' => 'required|numeric|min:0',
            'tipo_cultivo_id' => 'required|exists:tipo_cultivos,id',
            'fecha_siembra' => 'required|date',
            'estado' => 'required|in:en_cultivo,en_descanso,preparacion',
            'notas' => 'required|string'
        ]);

        $parcela->update([
            'nombre' => $nombre,
            'finca_id' => $finca->id,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $hectareas,
            'fecha_siembra' => $fecha_siembra,
            'estado' => $estado,
            'notas' => $notas,
        ]);
        return redirect()->route('mis_parcelas',['finca'=>$finca->id]);
    }


    public function search(Request $request, $id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $texto = $request->input('texto');

        if ($texto) {
            $parcelas = $finca->parcelas()
                ->where(function($q) use ($texto) {
                    $q->where('nombre', 'like', "%$texto%")
                        ->orWhere('estado', 'like', "%$texto%");
                })
                ->paginate(6)
                ->appends(['texto' => $texto]);
        } else {
            $parcelas = $finca->parcelas()->paginate(6);
        }

        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas', 'tipoCultivos'));
    }

    public function filter(Request $request, $id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);

        $tipo = $request->input('tipo_cultivo', 'todos');
        $estado = $request->input('estado', 'todos');

        if ($tipo == 'todos' && $estado == 'todos') {
            $parcelas = $finca->parcelas()->paginate(6);
        } elseif ($tipo == 'todos') {
            $parcelas = $finca->parcelas()->where('estado', $estado)->paginate(6);
        } elseif ($estado == 'todos') {
            $parcelas = $finca->parcelas()->where('tipo_cultivo_id', $tipo)->paginate(6);
        } else {
            $parcelas = $finca->parcelas()
                ->where('tipo_cultivo_id', $tipo)
                ->where('estado', $estado)
                ->paginate(6);
        }

        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas', 'tipoCultivos'));
    }

    public function show($id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para ver esta parcela');
        }

        return view('parcelas.show', compact('parcela', 'finca'));
    }





    /////////////////////////////////////////////api////////////////////////////////////////
    public function apiIndex($id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $parcelas = $finca->parcelas()->get();
        return $parcelas->toResourceCollection();

    }

    public function apiStore(Request $request)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($request->finca_id);

        $parcela = Parcela::create([
            'nombre' => $request->nombre,
            'finca_id' => $finca->id,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $request->hectareas,
            'fecha_siembra' => $request->fecha_siembra,
            'estado' => $request->estado,
            'notas' => $request->notas,
        ]);

        return response()->json([
            'mensaje' => 'Parcela creada',
            'parcela' => $parcela
        ]);
    }

    public function apiUpdate(Request $request, $id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para actualizar esta parcela');
        }

        $parcela->update([
            'nombre' => $request->nombre,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $request->hectareas,
            'fecha_siembra' => $request->fecha_siembra,
            'estado' => $request->estado,
            'notas' => $request->notas,
        ]);

        return response()->json([
            'mensaje' => 'Parcela actualizada',
            'parcela' => $parcela
        ]);
    }

    public function apiCambiarCultivo(Request $request , $id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;
        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para actualizar esta parcela');
        }
        $parcela->update([
            'tipo_cultivo_id' => $request->tipo_cultivo_id
        ]);

        return response()->json([
            'mensaje' => 'Tipo cultivo cambiado',
            'parcela' => $parcela
        ]);
    }

    public function apiDestroy($id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para eliminar esta parcela');
        }

        $parcela->delete();

        return response()->json([
            'mensaje' => 'Parcela eliminada'
        ]);
    }
}
