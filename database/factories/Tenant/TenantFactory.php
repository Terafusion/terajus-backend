<?php

namespace Database\Factories\Tenant;

use App\Models\Tenant\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant\Tenant>
 */
class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'user_id' => 1,
        ];
    }
}
