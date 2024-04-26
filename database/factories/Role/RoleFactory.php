<?php

namespace Database\Factories\Role;

use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition()
    {
        return [
            'name' => strtolower(fake()->unique()->word.fake()->unique()->word),
            'guard_name' => 'api',
            'tenant_id' => 1,
        ];
    }
}
