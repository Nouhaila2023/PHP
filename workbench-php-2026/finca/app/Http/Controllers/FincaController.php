<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Muestra las fincas del usuario logueado
        $fincas = Finca::where('user_id', auth()->id())->get();
        return view('fincas.index', compact('fincas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Finca $finca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finca $finca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finca $finca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finca $finca)
    {
        //
    }
}
