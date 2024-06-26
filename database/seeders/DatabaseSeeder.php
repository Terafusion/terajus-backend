<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TenantSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            PassportSeeder::class,
            LegalPleadingsTypesSeeder::class,
        ]);
    }
}
