<?php

namespace Database\Factories\Permission;

use App\Models\Permission\Permission;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    public function definition()
    {
        return [
            'name' => strtolower(fake()->unique()->word . fake()->unique()->word),
            'guard_name' => 'web', // Defina o nome da guarda que você está usando
        ];
    }
}
