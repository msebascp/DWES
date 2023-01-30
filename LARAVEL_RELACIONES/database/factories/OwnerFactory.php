<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->numerify('##########'),
            'age' => fake()->numberBetween(0, 120),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password,
            'api_token' => Str::random(60)
        ];
    }
}
