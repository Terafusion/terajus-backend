<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tenancy\Facades\Tenancy;

class ParticipantTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenantId = Tenancy::getTenant()->id;

        $participants = [
            'Polo Ativo',
            'Polo Passivo',
            'Autor',
            'Réu',
            'Requerente',
            'Requerido',
            'Litigante',
            'Terceiro Interessado',
            'Interveniente',
            'Amicus Curiae',
            'Testemunha',
            'Perito',
            'Advogado',
            'Juiz',
            'Promotor',
        ];

        foreach ($participants as $participant) {
            DB::table('participant_types')->insert([
                'type' => $participant,
                'tenant_id' => $tenantId
            ]);
        }
    }
}
