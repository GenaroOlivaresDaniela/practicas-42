<?php

namespace Database\Factories;

use App\Models\alumno;
use App\Models\docente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\optativa>
 */
class OptativaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'materia' => fake()->text(),
            'maestro_id' => docente::all()->random()->id,
            'alumno_id' => alumno::all()->random()->id
          
        ];
    }
}
