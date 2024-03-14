<?php

namespace Database\Factories\LegalPleading;

use App\Models\LegalCase\LegalCase;
use App\Models\LegalPleading\LegalPleading;
use App\Models\LegalPleadingType\LegalPleadingType;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalPleadingFactory extends Factory
{
    protected $model = LegalPleading::class;

    public function definition()
    {
        return [
            'user_id' => User::first()->id ?? User::factory()->create()->id,
            'fields_of_law' => $this->faker->word,
            'legal_case_id' => LegalCase::factory()->create()->id,
            'legal_pleading_type_id' => LegalPleadingType::factory()->create()->id,
            'tenant_id' => 1,
            'context' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['draft', 'final']),
        ];
    }
}
