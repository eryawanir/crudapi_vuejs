<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookTitle>
 */
class BookTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_names = [
            'hijau', 'biru'
        ];

        return [
            'title' => $this->faker->words(2, true),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'cover' => $this->faker->randomElement($image_names),
        ];
    }
}
