@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-10 p-6">

        <!-- Título -->
        <h1 class="text-3xl font-bold text-amber-900 mb-6">🌿 Dashboard de Fincas</h1>

        <!-- Tarjetas de métricas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-amber-200 rounded-xl shadow-lg p-6 text-center hover:bg-amber-300 transition">
                <div class="text-3xl font-bold text-amber-900">{{ $totalFincas }}</div>
                <div class="text-amber-800 mt-1">Fincas</div>
            </div>
            <div class="bg-amber-200 rounded-xl shadow-lg p-6 text-center hover:bg-amber-300 transition">
                <div class="text-3xl font-bold text-amber-900">{{ $hectareasTotales }}</div>
                <div class="text-amber-800 mt-1">Hectáreas Totales</div>
            </div>
            <div class="bg-amber-200 rounded-xl shadow-lg p-6 text-center hover:bg-amber-300 transition">
                <div class="text-3xl font-bold text-amber-900">{{ $totalParcelas }}</div>
                <div class="text-amber-800 mt-1">Parcelas</div>
            </div>
        </div>

        <!-- Gráfico de distribución de cultivos -->
        <div class="bg-amber-50 rounded-xl shadow-lg border border-amber-300 p-6">
            <h3 class="text-amber-900 font-semibold mb-4 text-xl">Distribución de Cultivos</h3>
            <canvas id="cultivosChart" class="w-full"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('cultivosChart').getContext('2d');

        const data = {
            labels: @json($cultivosDistribucion->pluck('tipoCultivo')->pluck('nombre')),
            datasets: [{
                label: 'Número de parcelas',
                data: @json($cultivosDistribucion->pluck('total')),
                backgroundColor: [
                    'rgba(156, 105, 20, 0.6)',
                    'rgba(175, 111, 30, 0.6)',
                    'rgba(198, 134, 38, 0.6)',
                    'rgba(220, 160, 60, 0.6)'
                ],
                borderColor: [
                    'rgba(156, 105, 20, 1)',
                    'rgba(175, 111, 30, 1)',
                    'rgba(198, 134, 38, 1)',
                    'rgba(220, 160, 60, 1)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#5C4033', // color marrón oscuro para leyenda
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
