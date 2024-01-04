<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Estados
        $estados = [
            'Pendiente',
            'En proceso',
            'Finalizado',
        ];

        foreach ($estados as $estado) {
            Status::factory()->create([
                'status' => $estado,
            ]);
        }
    }
}
