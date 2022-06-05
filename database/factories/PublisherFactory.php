<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $publisher = $this->faker->company();
        return [
            'publisher_code' => $this->faker->randomNumber(4),
            'publisher_name' => $publisher,
            'slug' => \Str::slug($publisher)
        ];
    }
}
