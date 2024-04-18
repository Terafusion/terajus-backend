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

        $trainee->givePermissionTo([
            'legal_case.view',
            'legal_case.list',
            'legal_pleading.create',
            'legal_pleading.view',
            'legal_pleading.list',
            'legal_pleading.update',
            'legal_pleading.download',
            'document_request.create',
            'document_request.view',
            'document_request.list',
            'document.download'
        ]);

        $customer->givePermissionTo('document.create', 'document.download', 'document_request.update', 'document_request.view', 'legal_case.view', 'legal_case.list');
    }
}
