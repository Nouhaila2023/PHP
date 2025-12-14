<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Finca;
use App\Models\Parcela;
use App\Models\TipoCultivo;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Número total de fincas
        $totalFincas = $user->fincas()->count();

        // Hectáreas totales gestionadas
        $hectareasTotales = $user->fincas()->sum('hectareas_totales');

        // Número total de parcelas
        $totalParcelas = Parcela::whereIn('finca_id', $user->fincas->pluck('id'))->count();

        // Distribución de cultivos (tipo y cantidad de parcelas)
        $cultivosDistribucion = Parcela::select('tipo_cultivo_id', \DB::raw('count(*) as total'))
            ->whereIn('finca_id', $user->fincas->pluck('id'))
            ->groupBy('tipo_cultivo_id')
            ->with('tipoCultivo') // relación
            ->get();

        $parcelas = Parcela::whereIn('finca_id', $user->fincas->pluck('id'))->get();

        return view('dashboard', compact(
            'totalFincas',
            'hectareasTotales',
            'totalParcelas',
            'cultivosDistribucion',
            'parcelas'
        ));
    }
}
