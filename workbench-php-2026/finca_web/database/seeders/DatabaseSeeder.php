<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Finca;
use App\Models\Parcela;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar todas las tablas en orden correcto
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Parcela::truncate();
        Finca::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ejecutar seeders
        $this->call([
            TipoCultivoSeeder::class,
            UserSeeder::class,
            FincaSeeder::class,
            ParcelaSeeder::class,
        ]);
    }
}
