<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = ['pending', 'in_progress', 'completed'];

        return [
            'employee_id' => null, // Seeder'da atanacak
            'title' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement($statuses),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
