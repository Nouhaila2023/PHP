<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Finca;
use App\Models\TipoCultivo;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parcela>
 */
class ParcelaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'nombre' => fake()->word() . ' Parcela',
            'finca_id' => Finca::inRandomOrder()->first()->id,
            'tipo_cultivo_id' => TipoCultivo::inRandomOrder()->first()->id,
            'hectareas' => fake()->randomFloat(2, 0.5, 50),
            'fecha_siembra' => fake()->dateTimeBetween('-2 years', 'now'),
            'estado' => fake()->randomElement(['en_cultivo', 'en_descanso', 'preparacion']),
            'notas' => fake()->optional(0.7)->sentence(),
        ];

    }
}
