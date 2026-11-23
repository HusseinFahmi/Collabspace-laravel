<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate=new DateTime("2026-11-23");
        return [
            "project_name"=>fake()->name,
            "description"=>fake()->sentence,
            "start_date"=>$startDate,
            "deadline"=>(clone $startDate)->modify('+'.fake()->numberBetween(15,30).'days'),
            "status"=>fake()->randomElement(['active', 'done', 'archived']),
            "priority"=>fake()->randomElement(['high', 'medium', 'low']),
            "project_type"=>fake()->name,
            "created_by"=>User::query()->inRandomOrder()->value("id"),





        ];
    }
}
