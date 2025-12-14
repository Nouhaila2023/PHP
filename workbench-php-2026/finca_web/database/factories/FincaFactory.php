<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Finca>
 */
class FincaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefijos = ['Hacienda', 'Finca', 'La', 'El', 'Rancho', 'Granja'];
        $nombres = ['Esperanza', 'Victoria', 'San José', 'Los Pinos', 'El Paraíso', 'Santa María', 'Los Olivos', 'La Cosecha', 'Buenavista', 'Monteverde'];


        // Selecciona aleatoriamente un prefijo y un nombre
        $prefijo = $this->faker->randomElement($prefijos);
        $nombre = $this->faker->randomElement($nombres);

        return [
            'nombre' => "$prefijo $nombre",
            'ubicacion' => $this->faker->city(),
            'hectareas_totales' => $this->faker->randomFloat(3, 1, 2000),
            'descripcion' => $this->faker->optional()->sentence(),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id

        ];
    }
}
