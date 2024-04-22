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
        // Clientes
        Permission::firstOrCreate(['name' => 'customer.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'customer.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'customer.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'customer.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'customer.delete', 'guard_name' => 'api']);

        // LegalCase
        Permission::firstOrCreate(['name' => 'legal_case.store', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_case.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_case.list', 'guard_name' => 'api']);
        //Permission::firstOrCreate(['name' => 'legal_case.update', 'guard_name' => 'api']);
        //Permission::firstOrCreate(['name' => 'legal_case.protocol', 'guard_name' => 'api']);


        // Usuários
        Permission::firstOrCreate(['name' => 'user.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'user.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'user.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'user.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'user.delete', 'guard_name' => 'api']);

        // Funções
        Permission::firstOrCreate(['name' => 'role.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'role.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'role.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'role.delete', 'guard_name' => 'api']);

        // Permissões
        Permission::firstOrCreate(['name' => 'permission.list', 'guard_name' => 'api']);

        // Peças Jurídicas
        Permission::firstOrCreate(['name' => 'legal_pleading.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_pleading.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_pleading.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_pleading.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_pleading.download', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'legal_pleading.delete', 'guard_name' => 'api']);

        // Solicitações de documentos
        Permission::firstOrCreate(['name' => 'document_request.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document_request.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document_request.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document_request.update', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document_request.delete', 'guard_name' => 'api']);

        // Documentos
        Permission::firstOrCreate(['name' => 'document.download', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document.view', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document.list', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'document.delete', 'guard_name' => 'api']);
    }
}