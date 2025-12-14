<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Finca;      // en FincaSeeder
use App\Models\Parcela;    // en ParcelaSeeder
use App\Models\TipoCultivo; // en ParcelaFactory


class FincaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Finca::factory(12)->create();
    }
}
