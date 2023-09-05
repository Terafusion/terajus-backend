<?php

namespace Database\Factories\Document;

use App\Models\Evidence\Evidence;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $evidence = Evidence::first() ?? Evidence::factory()->create();
        return [
            'file_name' => fake()->lastName,
            'file_path' => fake()->firstName,
            'model_type' => Evidence::class,
            'model_id' => $evidence->id
        ];
    }
}
