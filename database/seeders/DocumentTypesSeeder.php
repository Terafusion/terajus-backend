<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tenancy\Facades\Tenancy;

class DocumentTypesSeeder extends Seeder
{
    public function run()
    {
        $tenantId = Tenancy::getTenant()->id;
        DB::table('document_types')->insert([
            ['tenant_id' => $tenantId, 'name' => 'CPF', 'description' => 'Cadastro de Pessoa Física'],
            ['tenant_id' => $tenantId, 'name' => 'RG', 'description' => 'Registro Geral'],
            ['tenant_id' => $tenantId, 'name' => 'CNH', 'description' => 'Carteira Nacional de Habilitação'],
            ['tenant_id' => $tenantId, 'name' => 'Título de Eleitor', 'description' => 'Título de Eleitor'],
            ['tenant_id' => $tenantId, 'name' => 'Certidão de Nascimento', 'description' => 'Certidão de Nascimento'],
            ['tenant_id' => $tenantId, 'name' => 'Passaporte', 'description' => 'Passaporte'],
            ['tenant_id' => $tenantId, 'name' => 'Carteira de Trabalho', 'description' => 'Carteira de Trabalho'],
            ['tenant_id' => $tenantId, 'name' => 'Cartão SUS', 'description' => 'Cartão do Sistema Único de Saúde'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado de Reservista', 'description' => 'Certificado de Reservista'],
            ['tenant_id' => $tenantId, 'name' => 'Diploma', 'description' => 'Diploma de Graduação'],
            ['tenant_id' => $tenantId, 'name' => 'CPF do Dependente', 'description' => 'Cadastro de Pessoa Física do Dependente'],
            ['tenant_id' => $tenantId, 'name' => 'RG do Dependente', 'description' => 'Registro Geral do Dependente'],
            ['tenant_id' => $tenantId, 'name' => 'Cartão de Crédito', 'description' => 'Cartão de Crédito'],
            ['tenant_id' => $tenantId, 'name' => 'Cartão de Débito', 'description' => 'Cartão de Débito'],
            ['tenant_id' => $tenantId, 'name' => 'Certidão de Casamento', 'description' => 'Certidão de Casamento'],
            ['tenant_id' => $tenantId, 'name' => 'Certidão de Óbito', 'description' => 'Certidão de Óbito'],
            ['tenant_id' => $tenantId, 'name' => 'Carteira de Estudante', 'description' => 'Carteira de Estudante'],
            ['tenant_id' => $tenantId, 'name' => 'Carteira de Identificação Profissional', 'description' => 'Carteira de Identificação Profissional'],
            ['tenant_id' => $tenantId, 'name' => 'RG Estrangeiro', 'description' => 'Registro Geral para Estrangeiros'],
            ['tenant_id' => $tenantId, 'name' => 'Passaporte Estrangeiro', 'description' => 'Passaporte para Estrangeiros'],
            ['tenant_id' => $tenantId, 'name' => 'CNH Estrangeira', 'description' => 'Carteira Nacional de Habilitação para Estrangeiros'],
            ['tenant_id' => $tenantId, 'name' => 'Carteira de Trabalho Estrangeira', 'description' => 'Carteira de Trabalho para Estrangeiros'],
            ['tenant_id' => $tenantId, 'name' => 'CPF do Estrangeiro', 'description' => 'Cadastro de Pessoa Física para Estrangeiros'],
            ['tenant_id' => $tenantId, 'name' => 'Cartão de Residência Permanente', 'description' => 'Cartão de Residência Permanente para Estrangeiros'],
        ]);

        // Tipos de documentos para pessoa jurídica
        DB::table('document_types')->insert([
            ['tenant_id' => $tenantId, 'name' => 'CNPJ', 'description' => 'Cadastro Nacional da Pessoa Jurídica'],
            ['tenant_id' => $tenantId, 'name' => 'IE', 'description' => 'Inscrição Estadual'],
            ['tenant_id' => $tenantId, 'name' => 'NIRE', 'description' => 'Número de Identificação do Registro de Empresas'],
            ['tenant_id' => $tenantId, 'name' => 'Alvará de Funcionamento', 'description' => 'Alvará de Funcionamento'],
            ['tenant_id' => $tenantId, 'name' => 'Contrato Social', 'description' => 'Contrato Social da Empresa'],
            ['tenant_id' => $tenantId, 'name' => 'Estatuto', 'description' => 'Estatuto da Empresa'],
            ['tenant_id' => $tenantId, 'name' => 'Inscrição Municipal', 'description' => 'Inscrição Municipal'],
            ['tenant_id' => $tenantId, 'name' => 'DRE', 'description' => 'Demonstração do Resultado do Exercício'],
            ['tenant_id' => $tenantId, 'name' => 'CRLV', 'description' => 'Certificado de Registro e Licenciamento de Veículo'],
            ['tenant_id' => $tenantId, 'name' => 'NIF', 'description' => 'Número de Identificação Fiscal (para empresas estrangeiras)'],
            ['tenant_id' => $tenantId, 'name' => 'CCM', 'description' => 'Cadastro de Contribuintes Mobiliários'],
            ['tenant_id' => $tenantId, 'name' => 'CGC', 'description' => 'Cadastro Geral de Contribuintes'],
            ['tenant_id' => $tenantId, 'name' => 'INSS', 'description' => 'Instituto Nacional do Seguro Social'],
            ['tenant_id' => $tenantId, 'name' => 'CND', 'description' => 'Certidão Negativa de Débitos'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado Digital', 'description' => 'Certificado Digital para Assinatura Eletrônica'],
            ['tenant_id' => $tenantId, 'name' => 'Laudo de Vistoria', 'description' => 'Laudo de Vistoria do Corpo de Bombeiros'],
            ['tenant_id' => $tenantId, 'name' => 'Licença Ambiental', 'description' => 'Licença Ambiental da Empresa'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado de Regularidade FGTS', 'description' => 'Certificado de Regularidade do Fundo de Garantia do Tempo de Serviço'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado do Corpo de Bombeiros', 'description' => 'Certificado do Corpo de Bombeiros'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado de Origem', 'description' => 'Certificado de Origem de Mercadorias'],
            ['tenant_id' => $tenantId, 'name' => 'Certificado de Aprovação', 'description' => 'Certificado de Aprovação de Equipamento'],
            ['tenant_id' => $tenantId, 'name' => 'Certidão de Tributos Federais', 'description' => 'Certidão de Regularidade de Tributos Federais'],
            ['tenant_id' => $tenantId, 'name' => 'Laudo de Análise de Água', 'description' => 'Laudo de Análise de Qualidade da Água'],
        ]);
    }
}
