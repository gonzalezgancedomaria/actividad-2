<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'nombre' => 'Seguridad web',
            'apellidos' => 'seg',
            'email' => 'seguridadweb@campusviu.es',
            'password' => 'S3gur1d4d?W3b',
            'DNI'=>'7777777F',
            'telefono'=>'666666666',
            'pais'=>'España',
            'IBAN'=>'ES9999999999999999999'
        ]);
    }
}
