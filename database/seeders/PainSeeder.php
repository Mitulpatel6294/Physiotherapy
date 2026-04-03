<?php

namespace Database\Seeders;

use App\Models\Pain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pain::create([
            'title' => 'Knee Pain',
            'short_description' => 'Knee pain is a common issue caused by injury, overuse, or arthritis.',
            'full_description' => 'Detailed explanation about causes, symptoms, treatment, and risk factors of knee pain.',
            'main_image' => null,
            'slug' => 'knee-pain',
        ]);

        Pain::factory(5)->create();
    }
}
