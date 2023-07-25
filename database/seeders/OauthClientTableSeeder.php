<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Personal Access Client */
        DB::insert(
            'insert into oauth_clients (id, name, secret, redirect, personal_access_client, password_client, revoked) values (?, ?, ?, ?, ?, ?, ?)',
            [
                'beb9e0f4-6355-413a-bb51-dac5e50612e6',
                'Terajus Personal Access Client',
                'uOWvoOFvcPQscziD8QbyiF4W9rCnavm009V9PtjZ',
                'http://localhost',
                1,
                0,
                0
            ]
        );

        /** Password Grant Client  */
        DB::insert(
            'insert into oauth_clients (id, name, secret, redirect, provider, personal_access_client, password_client, revoked) values (?, ?, ?, ?, ?, ?, ?, ?)',
            [
                'cc5c245e-e3a2-4706-8009-fd045c87a698',
                'Terajus Password Grant Client',
                'aOCMPnvPQ0qjXuL4eV05m0AaQsVC7cXPMqPdxTyq',
                'users',
                'http://localhost',
                0,
                1,
                0
            ]
        );

        /** Insert into personal access client table */
        DB::insert(
            'insert into oauth_personal_access_clients (client_id) values (?)',
            [1]
        );
    }
}
