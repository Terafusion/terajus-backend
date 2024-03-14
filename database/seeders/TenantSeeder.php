<?php

namespace Database\Seeders;

use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Terajus',
            'email' => 'contato@terajus.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'person_type' => 'BUSINESS',
        ]);

        $tenant = Tenant::create(['name' => $user->name.'\'s Tenant', 'user_id' => $user->id]);
    }
}
