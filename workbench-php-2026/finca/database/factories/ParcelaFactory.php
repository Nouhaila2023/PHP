<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'nombre' => $this->faker->unique()->bothify('Parcela ##??'),
            'hectareas' => $this->faker->randomFloat(3, 0.1, 100),
            'fecha_siembra' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'estado' => $this->faker->randomElement(['en_cultivo', 'en_descanso', 'preparacion']),
            'notas' => $this->faker->optional()->paragraph(),
            'finca_id' => fake()->numberBetween(1, 12),
            'tipo_cultivo_id' => fake()->numberBetween(1, 8),
        ];
    }
}
