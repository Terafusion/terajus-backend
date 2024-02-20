<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lawyer = Role::firstOrCreate([
            'name' => 'lawyer',
            'guard_name' => 'api'
        ]);

        $trainee = Role::firstOrCreate([
            'name' => 'trainee',
            'guard_name' => 'api'
        ]);

        $customer = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'api'
        ]);

        $lawyer->syncPermissions(Permission::all());
        $trainee->givePermissionTo('legal_case.store');
        $trainee->givePermissionTo('legal_case.update');
        $trainee->givePermissionTo('legal_case.protocol');
        $trainee->givePermissionTo('user.store');
        $trainee->givePermissionTo('user.update');
        $customer->givePermissionTo('document.store');
    }
}
