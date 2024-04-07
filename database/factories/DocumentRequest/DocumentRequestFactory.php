<?php

namespace Database\Factories\DocumentRequest;

use App\Models\Customer\Customer;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentRequest\DocumentRequest>
 */
class DocumentRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::first()->id ?? User::factory()->create()->id,
            'customer_id' => Customer::factory()->create()->id,
        ];
    }
}
