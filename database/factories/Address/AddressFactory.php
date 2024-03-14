<?php

namespace Database\Factories\Address;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street' => fake()->streetAddress,
            'number' => fake()->buildingNumber,
            'district' => fake()->word,
            'city' => fake()->city,
            'state' => fake()->stateAbbr,
            'country' => 'US',
            'complement' => fake()->sentence,
            'zip_code' => fake()->postcode,
            'user_id' => User::first()->id ?? User::factory()->create()->id,
            'addressable_type' => User::class,
            'addressable_id' => User::first()->id,
        ];
    }
}
