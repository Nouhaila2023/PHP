
@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $finca->nombre }}</h1>

        <p><strong>Ubicación:</strong> {{ $finca->ubicacion }}</p>
        <p><strong>Hectáreas:</strong> {{ $finca->hectareas_totales }}</p>
        <p>{{ $finca->descripcion }}</p>

        <hr>

        <h3>Parcelas</h3>

        <a href="{{ route('parcelas.create', $finca) }}" class="btn btn-primary mb-3">Añadir Parcela</a>

        @if($finca->parcelas->count())
            <ul>
                @foreach($finca->parcelas as $parcela)
                    <li>{{ $parcela->nombre }} - {{ $parcela->hectareas }} ha</li>
                @endforeach
            </ul>
        @else
            <p>No hay parcelas en esta finca.</p>
        @endif
    </div>
@endsection
