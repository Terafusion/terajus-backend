<?php

namespace Database\Factories\DocumentType;

use App\Models\DocumentType\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentTypeFactory extends Factory
{
    protected $model = DocumentType::class;

    public function definition()
    {
        return [
            'tenant_id' => 1,
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
        ];
    }
}
