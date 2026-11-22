<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
            "project_id"=>Project::query()->inRandomOrder()->value("id"),
            "team_id"=>Team::query()->inRandomOrder()->value("id"),
            "title"=>fake()->paragraph(),
            "description"=>fake()->sentence(),
            "status"=>fake()->randomElement( ['todo', 'in_progress', 'in_review', 'completed']),
            "priority"=>fake()->randomElement(['high', 'medium', 'low']),
            "progress"=>fake()->randomElement([0,100]),
            "due_date"=>fake()->dateTimeBetween("-30 days","+30 days")->format("Y-m-d"),
            "created_by"=>User::query()->inRandomOrder()->value("id"),




        ];
    }
}
