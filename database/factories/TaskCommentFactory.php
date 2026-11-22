<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TaskComment>
 */
class TaskCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "comment"=>fake()->sentence(),
            "user_id"=>User::query()->inRandomOrder()->value("id"),
            "task_id"=>Task::query()->inRandomOrder()->value("id"),

        ];
    }
}
