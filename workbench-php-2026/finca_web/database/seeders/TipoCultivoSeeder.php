<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoCultivo;

class TipoCultivoSeeder extends Seeder
{
    public function run()
    {
        $cultivos = [
            ['nombre' => 'Olivo', 'nombre_cientifico' => 'Olea europaea', 'familia' => 'Oleaceae', 'ciclo' => 'perenne', 'descripcion' => 'Árbol frutal que produce aceitunas.'],
            ['nombre' => 'Naranjo', 'nombre_cientifico' => 'Citrus sinensis', 'familia' => 'Rutaceae', 'ciclo' => 'perenne', 'descripcion' => 'Árbol frutal que produce naranjas.'],
            ['nombre' => 'Limonero', 'nombre_cientifico' => 'Citrus limon', 'familia' => 'Rutaceae', 'ciclo' => 'perenne', 'descripcion' => 'Árbol frutal que produce limones.'],
            ['nombre' => 'Tomate', 'nombre_cientifico' => 'Solanum lycopersicum', 'familia' => 'Solanaceae', 'ciclo' => 'anual', 'descripcion' => 'Planta hortícola de fruto rojo.'],
            ['nombre' => 'Lechuga', 'nombre_cientifico' => 'Lactuca sativa', 'familia' => 'Asteraceae', 'ciclo' => 'anual', 'descripcion' => 'Hortaliza de hojas comestibles.'],
            ['nombre' => 'Vid', 'nombre_cientifico' => 'Vitis vinifera', 'familia' => 'Vitaceae', 'ciclo' => 'perenne', 'descripcion' => 'Planta trepadora que produce uvas.'],
            ['nombre' => 'Almendro', 'nombre_cientifico' => 'Prunus dulcis', 'familia' => 'Rosaceae', 'ciclo' => 'perenne', 'descripcion' => 'Árbol frutal que produce almendras.'],
            ['nombre' => 'Aguacate', 'nombre_cientifico' => 'Persea americana', 'familia' => 'Lauraceae', 'ciclo' => 'perenne', 'descripcion' => 'Árbol frutal que produce aguacates.'],
            ['nombre' => 'Trigo', 'nombre_cientifico' => 'Triticum aestivum', 'familia' => 'Poaceae', 'ciclo' => 'anual', 'descripcion' => 'Cereal de grano.'],
            ['nombre' => 'Maíz', 'nombre_cientifico' => 'Zea mays', 'familia' => 'Poaceae', 'ciclo' => 'anual', 'descripcion' => 'Cereal de grano utilizado para alimentos y forraje.'],
        ];

        foreach ($cultivos as $cultivo) {
            TipoCultivo::create($cultivo);
        }
    }
}
