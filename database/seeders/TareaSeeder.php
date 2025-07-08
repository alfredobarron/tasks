<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aquí puedes crear algunas tareas de ejemplo
        \App\Models\Tarea::create([
            'titulo' => 'Tarea 1',
            'descripcion' => 'Descripción de la tarea 1',
            'completada' => false,
            'fecha_limite' => now()->addDays(7),
        ]);

        \App\Models\Tarea::create([
            'titulo' => 'Tarea 2',
            'descripcion' => 'Descripción de la tarea 2',
            'completada' => true,
            'fecha_limite' => now()->addDays(3),
        ]);

        \App\Models\Tarea::create([
            'titulo' => 'Tarea 3',
            'descripcion' => 'Descripción de la tarea 3',
            'completada' => false,
            'fecha_limite' => now()->addDays(14),
        ]);

        \App\Models\Tarea::create([
            'titulo' => 'Tarea 4',
            'descripcion' => 'Descripción de la tarea 4',
            'completada' => true,
            'fecha_limite' => now()->addDays(1),
        ]);
    }
}
