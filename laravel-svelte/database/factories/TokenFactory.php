<?php

namespace Database\Factories;

use App\Enum\AccountTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Token>
 */
class TokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => UserFactory::create()->id,
            'value' => $this->faker->numerify('##'),
            'account_type' => AccountTypeEnum::class->random(),
        ];
    }
}
