<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_US');

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'photos' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl(), $this->faker->imageUrl()]),
            'price' => $this->faker->numberBetween(10, 1000),
        ];
    }
}

