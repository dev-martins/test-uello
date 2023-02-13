<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->uuid(),
            'name' => $this->faker->firstName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
