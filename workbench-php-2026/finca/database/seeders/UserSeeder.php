<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Manolo Díaz',
            'email' => 'mandiaz@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'Ana Sánchez',
            'email' => 'anasan@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666777888',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'Mohammed Fatine',
            'email' => 'mohfat@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666999888',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
        DB::table('users')->insert([
            'name' => 'José Alvárez',
            'email' => 'josalv@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Pulpí'
        ]);
        DB::table('users')->insert([
            'name' => 'Hugo López',
            'email' => 'huglop@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '666666666',
            'ubicacion' => 'Palomares'
        ]);
    }
}
