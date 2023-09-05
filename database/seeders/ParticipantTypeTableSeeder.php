<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            ]);
        }
    }
}
