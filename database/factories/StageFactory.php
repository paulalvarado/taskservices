<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'task_title' => $this->faker->sentence,
            'task_description' => $this->faker->paragraph,
            'create_at' => $this->faker->date(),
            'update_at' => $this->faker->date(),
            'id_status' => Status::factory(),
        ];
    }
}
