<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir posibles valores para el campo sexo
        $sexo = ['Masculino', 'Femenino'];

        // Insertar 10 registros de prueba
        for ($i = 0; $i < 10; $i++) {
            DB::table('alumno')->insert([
                "nombre" => fake()->name(),
                "telefono" => fake()->numerify('##########'), // Teléfono aleatorio
                "edad" => rand(18, 100), // Edad aleatoria entre 18 y 100
                "password" => 'password' . $i, // Contraseña
                "email" => 'user' . $i . '@example.com', // Correo único con índice
                "sexo" => fake()->randomElement($sexo), // Sexo aleatorio
            ]);
        }
    }
}
