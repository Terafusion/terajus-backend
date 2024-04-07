<?php

namespace Database\Factories\LegalPleadingType;

use App\Models\LegalPleadingType\LegalPleadingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalPleadingTypeFactory extends Factory
{
    protected $model = LegalPleadingType::class;

    public function definition()
    {
        return [
            'tenant_id' => 1,
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
        ];
    }
}
