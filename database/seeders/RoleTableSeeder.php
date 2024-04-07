<?php

namespace Database\Seeders;

use App\Models\Role\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $tenantId = Tenancy::getTenant()->id ?? config('terajus.default_tenant.id');

        $lawyer = Role::firstOrCreate([
            'name' => 'lawyer',
            'guard_name' => 'api',
            'tenant_id' => $tenantId,
        ]);

        $trainee = Role::firstOrCreate([
            'name' => 'trainee',
            'guard_name' => 'api',
            'tenant_id' => $tenantId,
        ]);

        $customer = Role::firstOrCreate([
            'name' => 'customer',
            'guard_name' => 'api',
            'tenant_id' => $tenantId,
        ]);

        $lawyer->givePermissionTo(Permission::all());

        $trainee->givePermissionTo(['legal_case.store', 'legal_case.update', 'legal_case.protocol', 'user.store', 'user.update']);

        $customer->givePermissionTo('document.store');
    }
}
