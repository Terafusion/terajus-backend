<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'legal_case.store',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'legal_case.protocol',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'document.store',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'user.store',
            'guard_name' => 'api'
        ]);

        Permission::create([
            'name' => 'user.update',
            'guard_name' => 'api'
        ]);
    }
}
