<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Sencillo',
            'description' => 'Ideal para principiantes o aquellos que prefieren desafíos más ligeros. Ofrece enigmas y acertijos de baja dificultad para una introducción suave al escape room.',
            'price' => 50,
        ]);
        Service::create([
            'name' => 'Normal',
            'description' => 'Diseñado para entretener a aquellos con cierta experiencia, presenta enigmas de dificultad media que requieren trabajo en equipo y habilidades de resolución de problemas.',
            'price' => 65,
        ]);
        Service::create([
            'name' => 'Complicado',
            'description' => 'Ofrece un verdadero desafío mental con enigmas intrincados y pistas ocultas, perfecto para escapistas experimentados que buscan una aventura más desafiante.',
            'price' => 85,
        ]);
        Service::create([
            'name' => 'Life or die',
            'description' => 'Una experiencia intensa y llena de adrenalina con acertijos de dificultad extrema, donde los participantes deben tomar decisiones rápidas y precisas para escapar antes de que sea demasiado tarde.',
            'price' => 100,
        ]);
    }
}
