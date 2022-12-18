<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->name(),
            'telefono'=> $this->faker->numerify('###########'),
            'edad'=> $this->faker->numberBetween(18, 100),
            'password'=> $this->faker-> password(),
            'email'=> $this->faker->unique()->safeEmail(),
            'sexo'=> $this->faker-> randomElement(['H', 'M']),
        ];
    }
}
