<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Money\Currency;
use Money\Money;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'imageSource' => $this->faker->imageUrl(),
            'name' => $this->faker->word(),
            'price' => $this->faker->numerify('##'),
            'description' => $this->faker->sentence(),
        ];
    }
}
