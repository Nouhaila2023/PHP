<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Finca;      // en FincaSeeder
use App\Models\Parcela;    // en ParcelaSeeder
use App\Models\TipoCultivo; // en ParcelaFactory


class ParcelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Parcela::factory(40)->create();
    }
}
