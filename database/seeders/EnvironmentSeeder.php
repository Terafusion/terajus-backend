<?php

namespace Database\Seeders;

use Database\Seeders\DocumentTypesSeeder;
use Database\Seeders\ParticipantTypeTableSeeder;
use Database\Seeders\RoleTableSeeder;
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
