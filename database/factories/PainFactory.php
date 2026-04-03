<?php

namespace Database\Factories;

use App\Models\Pain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Pain>
 */
class PainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->randomElement([
            'Knee Pain',
            'Back Pain',
            'Neck Pain',
            'Shoulder Pain'
        ]);

        return [
            'title' => $title,
            'short_description' => fake()->paragraph(3),
            'full_description' => fake()->paragraphs(5, true),
            'main_image' => null,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1, 1000)),
        ];
    }
}
