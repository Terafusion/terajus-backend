<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EnvironmentSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            ParticipantTypeTableSeeder::class,
            DocumentTypesSeeder::class,
        ]);
    }
}
