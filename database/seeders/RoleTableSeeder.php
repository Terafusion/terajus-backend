<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tenancy\Facades\Tenancy;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenantId = Tenancy::getTenant()->id;

        $lawyer = Role::firstOrCreate([
            'name' => 'lawyer',
            'guard_name' => 'api',
            'tenant_id' => $tenantId
        ]);

        $trainee = Role::firstOrCreate([
            'name' => 'trainee',
            'guard_name' => 'api',
            'tenant_id' => $tenantId
        ]);

        $customer = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'api',
            'tenant_id' => $tenantId
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
