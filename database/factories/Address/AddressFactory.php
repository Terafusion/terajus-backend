<?php

namespace Database\Factories\Address;

use App\Models\Address\Address;
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
            'country' => 'US', // Pode alterar para o país desejado
            'complement' => fake()->sentence,
            'zip_code' => fake()->postcode,
        ];
    }
}
