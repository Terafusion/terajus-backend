<?php

namespace Database\Factories\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'nif_number' => uniqid(),
            'registration_number' => uniqid(),
            'marital_status' => 'SOLTEIRO',
            'occupation' => 'Advogado',
            'gender' => 'MALE',
            'person_type' => 'PERSONAL',
            'tenant_id' => 1,
        ];
    }
}
