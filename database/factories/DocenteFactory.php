<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nPersonal' => $this->faker->unique->randomNumber(2),
            'nombre' => $this->faker->firstName(),
            'apellidoPaterno'=> $this->faker->lastName(),
            'apellidoMaterno'=> $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
