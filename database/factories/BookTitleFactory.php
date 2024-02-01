<?php

namespace Database\Factories;

use App\Helpers\CoverDummyImage;
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

        return [
            'title' => $this->faker->words(2, true),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'cover' => $this->faker->randomElement(CoverDummyImage::COVER),
        ];
    }
}
