<?php

namespace Database\Factories\DocumentRequestDoc;

use App\Models\Evidence\Evidence;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'document_request_id' => 1
        ];
    }
}
