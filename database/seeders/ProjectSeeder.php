<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++){
            Project::create([
                'title' => fake()->words(5, true),
                'description' => fake()->paragraph(20),
                'image' => fake()->imageUrl(640, 480, 'projects', true),
                'is_started' => fake()->boolean(70),
            ]);
        }
    }
}
