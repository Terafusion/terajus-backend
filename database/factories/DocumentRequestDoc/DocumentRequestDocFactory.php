<?php

namespace Database\Factories\DocumentRequestDoc;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentRequestDoc\DocumentRequestDoc>
 */
class DocumentRequestDocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'document_type_id' => 1,
            'document_request_id' => 1,
        ];
    }
}
