<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'no_str' => $this->faker->word(),
            'email' => $this->faker->word(),
            'phone_number' => $this->faker->word(),
            'no_wa' => $this->faker->word(),
            'address' => $this->faker->word(),
            'link_map' => $this->faker->word(),
            'password' => $this->faker->word(),
            'role' => $this->faker->word(),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
