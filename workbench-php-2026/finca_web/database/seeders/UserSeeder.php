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
        // Deshabilitar temporalmente las llaves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Limpiar la tabla users
        DB::table('users')->truncate();

        // Volver a habilitar las llaves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert([
            'name' => 'Laura Fernández',
            'email' => 'laura@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '600123456',
            'ubicacion' => 'Almería'
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos Martínez',
            'email' => 'carlos.mar@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '600654321',
            'ubicacion' => 'Roquetas de Mar'
        ]);

        DB::table('users')->insert([
            'name' => 'María López',
            'email' => 'maria.lopez@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '600987654',
            'ubicacion' => 'Vícar'
        ]);

        DB::table('users')->insert([
            'name' => 'Javier Gómez',
            'email' => 'javier.gomez@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '600321987',
            'ubicacion' => 'Níjar'
        ]);

        DB::table('users')->insert([
            'name' => 'Sofía Ruiz',
            'email' => 'sofia.ruiz@gmail.com',
            'password' => Hash::make('12345678'),
            'telefono' => '600456789',
            'ubicacion' => 'Cuevas del Almanzora'
        ]);
    }
}
