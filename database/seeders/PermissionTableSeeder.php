<?php

namespace Database\Seeders;

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
        Permission::firstOrCreate([
            'name' => 'legal_case.store',
            'guard_name' => 'api',
        ]);

        Permission::firstOrCreate([
            'name' => 'legal_case.update',
            'guard_name' => 'api',
        ]);

        Permission::firstOrCreate([
            'name' => 'legal_case.protocol',
            'guard_name' => 'api',
        ]);

        Permission::firstOrCreate([
            'name' => 'document.store',
            'guard_name' => 'api',
        ]);

        Permission::firstOrCreate([
            'name' => 'user.store',
            'guard_name' => 'api',
        ]);

        Permission::firstOrCreate([
            'name' => 'user.update',
            'guard_name' => 'api',
        ]);
    }
}
