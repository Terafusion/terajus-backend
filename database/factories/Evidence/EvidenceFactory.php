<?php

namespace Database\Factories\Evidence;

use App\Models\LegalCase\LegalCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EvidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $legalCase = LegalCase::first();
        return [
            'description' => fake()->text,
            'legal_case_reference' => uniqid(),
            'legal_case_id' => $legalCase->id,
        ];
    }
}
