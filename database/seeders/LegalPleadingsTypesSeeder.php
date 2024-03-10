<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalPleadingsTypesSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['name' => 'Petição Inicial', 'description' => 'Documento que inicia um processo judicial, apresentando as pretensões do autor e os fundamentos legais.'],
            ['name' => 'Contestação', 'description' => 'Resposta do réu à petição inicial, contestando as alegações e apresentando suas defesas.'],
            ['name' => 'Reconvenção', 'description' => 'Ação movida pelo réu contra o autor no mesmo processo em resposta à petição inicial.'],
            ['name' => 'Embargos de Declaração', 'description' => 'Recurso utilizado para esclarecer obscuridades, eliminar contradições ou suprir omissões em uma decisão judicial.'],
            ['name' => 'Apelação', 'description' => 'Recurso interposto contra uma decisão judicial com o objetivo de reformá-la.'],
            ['name' => 'Agravo de Instrumento', 'description' => 'Recurso utilizado para impugnar decisões interlocutórias no curso do processo.'],
            ['name' => 'Habeas Corpus', 'description' => 'Ação judicial visando assegurar a liberdade de locomoção de alguém ilegalmente detido ou ameaçado de sofrer constrangimento.'],
            ['name' => 'Mandado de Segurança', 'description' => 'Ação judicial destinada a proteger direito líquido e certo não amparado por habeas corpus ou habeas data.'],
            ['name' => 'Reclamação Trabalhista', 'description' => 'Ação judicial movida por empregado contra empregador para a solução de questões trabalhistas.'],
            ['name' => 'Notificação Extrajudicial', 'description' => 'Documento extrajudicial utilizado para comunicar formalmente uma intenção ou exigir algo.'],
            ['name' => 'Contrato Social', 'description' => 'Documento que estabelece as normas e condições de funcionamento de uma sociedade empresarial.'],
            ['name' => 'Acordo Extrajudicial', 'description' => 'Documento que formaliza um acordo entre partes fora do âmbito judicial.'],
            ['name' => 'Inventário', 'description' => 'Processo judicial destinado a apurar e partilhar os bens deixados por uma pessoa falecida.'],
            ['name' => 'Usucapião', 'description' => 'Ação judicial que busca o reconhecimento do direito de propriedade sobre um bem adquirido pela posse prolongada.'],
            ['name' => 'Execução de Título Extrajudicial', 'description' => 'Processo judicial para cobrança de dívidas decorrentes de títulos extrajudiciais, como contratos e notas promissórias.'],
            ['name' => 'Recuperação Judicial', 'description' => 'Procedimento judicial destinado à reestruturação financeira de empresas em situação de crise econômico-financeira.'],
        ];

        $tenantId = config('terajus.default_tenant.id');

        foreach ($types as $type) {
            DB::table('legal_pleading_types')->insert(array_merge($type, ['tenant_id' => $tenantId]));
        }
    }
}
