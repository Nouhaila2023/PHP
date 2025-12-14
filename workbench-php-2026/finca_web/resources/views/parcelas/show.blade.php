
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $parcela->nombre }}</h1>
        <p><strong>Finca:</strong> {{ $finca->nombre }}</p>
        <p><strong>Hectáreas:</strong> {{ $parcela->hectareas }}</p>
        <p><strong>Tipo de Cultivo:</strong> {{ $parcela->tipoCultivo->nombre }}</p>
        <p><strong>Fecha de Siembra:</strong> {{ $parcela->fecha_siembra }}</p>
        <p><strong>Estado:</strong> {{ $parcela->estado }}</p>
        <p><strong>Notas:</strong> {{ $parcela->notas }}</p>

        <a href="{{ route('parcelas.index', $finca->id) }}" class="mt-4 inline-block bg-amber-900 text-white px-4 py-2 rounded">Volver</a>
    </div>
@endsection
