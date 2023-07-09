<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement([StatusEnum::fresh, StatusEnum::done]),
            'priority' => $this->faker->randomElement([PriorityEnum::high, PriorityEnum::low])
        ];
    }
}
