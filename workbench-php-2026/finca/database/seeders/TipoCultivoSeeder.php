<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoCultivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposCultivo = [
            [
                'nombre' => 'Maíz',
                'nombre_cientifico' => 'Zea mays',
                'familia' => 'Poaceae',
                'ciclo' => 'anual',
                'descripcion' => 'El maíz es un cereal ampliamente cultivado en todo el mundo.'
            ],
            [
                'nombre' => 'Trigo',
                'nombre_cientifico' => 'Triticum aestivum',
                'familia' => 'Poaceae',
                'ciclo' => 'anual',
                'descripcion' => 'El trigo es uno de los cultivos más importantes para la alimentación humana.'
            ],
            [
                'nombre' => 'Manzano',
                'nombre_cientifico' => 'Malus domestica',
                'familia' => 'Rosaceae',
                'ciclo' => 'perenne',
                'descripcion' => 'El manzano es un árbol frutal que produce manzanas, una fruta muy consumida en todo el mundo.'
            ],
            [
                'nombre' => 'Naranja',
                'nombre_cientifico' => 'Musa acuminata',
                'familia' => 'Rosaceae',
                'ciclo' => 'anual',
                'descripcion' => 'La naranja es una fruta de la familia Rosaceae, perteneciente a la orden Musaceae.'
            ],
            [
                'nombre' => 'Aguacate',
                'nombre_cientifico' => 'Agave officinalis',
                'familia' => 'Agavaceae',
                'ciclo' => 'anual',
                'descripcion' => 'El aguacate es una fruta de la familia Agavaceae, perteneciente a la orden Cucurbitaceae.'
            ],
            [
                'nombre' => 'Almendro',
                'nombre_cientifico' => 'Allium cepa',
                'familia' => 'Fabaceae',
                'ciclo' => 'anual',
                'descripcion' => 'El almendro es una fruta de la familia Fabaceae, perteneciente a la orden Liliaceae.'
            ],
            [
                'nombre' => 'Vid',
                'nombre_cientifico' => 'Vitis vinifera',
                'familia' => 'Vitaceae',
                'ciclo' => 'anual',
                'descripcion' => 'El vid es una fruta de la familia Vitaceae, perteneciente a la orden Liliaceae.'
            ],
            [
                'nombre' => 'Limonero',
                'nombre_cientifico' => 'Citrus limon',
                'familia' => 'Citrus',
                'ciclo' => 'anual',
                'descripcion' => 'Árbol pequeño a mediano, normalmente entre 3 y 6 metros de altura, Hojas perennes, alternas, de color verde brillante y forma ovalada con borde ligeramente dentado'
            ],
            [
                'nombre' => 'Olivo',
                'nombre_cientifico' => 'Olea europaea L.',
                'familia' => 'Oleaceae',
                'ciclo' => 'anual',
                'descripcion' => 'árbol perenne de hoja estrecha y verde plateada,
                 típico del clima mediterráneo, conocido por su longevidad y resistencia
                 a la sequía. Sus frutos, las aceitunas'
            ]
        ];

        foreach ($tiposCultivo as $tipo) {
            \DB::table('tipo_cultivos')->insert($tipo);
        }
    }
}
