<?php

namespace Database\Factories;

use App\Models\Stage;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

class StageFactory extends Factory
{
    protected $model = Stage::class;

    public function definition(): array
    {
        return [
            'stage_title' => $this->faker->sentence,
            'stage_description' => $this->faker->paragraph,
            'id_status' => Status::factory(),
        ];
    }
}
