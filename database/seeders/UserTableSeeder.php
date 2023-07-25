<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Advogado Teste',
            'email' => 'advogado@terafusion.com.br',
            'password' => Hash::make('12345678')
        ]);

        User::factory()->create([
            'name' => 'Cliente Teste',
            'email' => 'cliente@terafusion.com.br',
            'password' => Hash::make('12345678')
        ]);
    }
}
