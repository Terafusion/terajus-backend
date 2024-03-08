<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lawyer = User::factory()->create([
            'name' => 'Advogado Teste',
            'email' => 'advogado@terafusion.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'gender' => 'MALE',
            'person_type' => 'PERSONAL'
        ]);

        $trainee = User::factory()->create([
            'name' => 'Estagiário Teste',
            'email' => 'estagiario@terafusion.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'gender' => 'MALE',
            'person_type' => 'PERSONAL'

        ]);

        $customer = User::factory()->create([
            'name' => 'Cliente Teste',
            'email' => 'cliente@terafusion.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'gender' => 'MALE',
            'person_type' => 'PERSONAL'
        ]);

        $plaintiff = User::factory()->create([
            'name' => 'Parte Ativa Teste',
            'email' => 'pateste@terafusion.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'gender' => 'MALE',
            'person_type' => 'PERSONAL'

        ]);
        $defendant = User::factory()->create([
            'name' => 'Parte Passiva Teste',
            'email' => 'ppteste@terafusion.com.br',
            'password' => Hash::make('12345678'),
            'nif_number' => uniqid(),
            'gender' => 'MALE',
            'person_type' => 'PERSONAL'
        ]);

        $lawyer->syncRoles('lawyer');
        $trainee->syncRoles('trainee');
        $customer->syncRoles('customer');
        $plaintiff->syncRoles('customer');
        $defendant->syncRoles('customer');
    }
}
