<?php

namespace Database\Seeders;

use App\Models\Finca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FincaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Finca::factory(12)->create();
    }
}
