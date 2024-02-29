<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypesSeeder extends Seeder
{
    public function run()
    {
        // Tipos de documentos para pessoa física
        DB::table('document_types')->insert([
            ['name' => 'CPF', 'description' => 'Cadastro de Pessoa Física'],
            ['name' => 'RG', 'description' => 'Registro Geral'],
            ['name' => 'CNH', 'description' => 'Carteira Nacional de Habilitação'],
            ['name' => 'Título de Eleitor', 'description' => 'Título de Eleitor'],
            ['name' => 'Certidão de Nascimento', 'description' => 'Certidão de Nascimento'],
            ['name' => 'Passaporte', 'description' => 'Passaporte'],
            ['name' => 'Carteira de Trabalho', 'description' => 'Carteira de Trabalho'],
            ['name' => 'Cartão SUS', 'description' => 'Cartão do Sistema Único de Saúde'],
            ['name' => 'Certificado de Reservista', 'description' => 'Certificado de Reservista'],
            ['name' => 'Diploma', 'description' => 'Diploma de Graduação'],
            ['name' => 'CPF do Dependente', 'description' => 'Cadastro de Pessoa Física do Dependente'],
            ['name' => 'RG do Dependente', 'description' => 'Registro Geral do Dependente'],
            ['name' => 'Cartão de Crédito', 'description' => 'Cartão de Crédito'],
            ['name' => 'Cartão de Débito', 'description' => 'Cartão de Débito'],
            ['name' => 'Certidão de Casamento', 'description' => 'Certidão de Casamento'],
            ['name' => 'Certidão de Óbito', 'description' => 'Certidão de Óbito'],
            ['name' => 'Carteira de Estudante', 'description' => 'Carteira de Estudante'],
            ['name' => 'Carteira de Identificação Profissional', 'description' => 'Carteira de Identificação Profissional'],
            ['name' => 'RG Estrangeiro', 'description' => 'Registro Geral para Estrangeiros'],
            ['name' => 'Passaporte Estrangeiro', 'description' => 'Passaporte para Estrangeiros'],
            ['name' => 'CNH Estrangeira', 'description' => 'Carteira Nacional de Habilitação para Estrangeiros'],
            ['name' => 'Carteira de Trabalho Estrangeira', 'description' => 'Carteira de Trabalho para Estrangeiros'],
            ['name' => 'CPF do Estrangeiro', 'description' => 'Cadastro de Pessoa Física para Estrangeiros'],
            ['name' => 'Cartão de Residência Permanente', 'description' => 'Cartão de Residência Permanente para Estrangeiros'],
            // Adicione outros tipos de documentos para pessoa física aqui
        ]);

        // Tipos de documentos para pessoa jurídica
        DB::table('document_types')->insert([
            ['name' => 'CNPJ', 'description' => 'Cadastro Nacional da Pessoa Jurídica'],
            ['name' => 'IE', 'description' => 'Inscrição Estadual'],
            ['name' => 'NIRE', 'description' => 'Número de Identificação do Registro de Empresas'],
            ['name' => 'Alvará de Funcionamento', 'description' => 'Alvará de Funcionamento'],
            ['name' => 'Contrato Social', 'description' => 'Contrato Social da Empresa'],
            ['name' => 'Estatuto', 'description' => 'Estatuto da Empresa'],
            ['name' => 'Inscrição Municipal', 'description' => 'Inscrição Municipal'],
            ['name' => 'DRE', 'description' => 'Demonstração do Resultado do Exercício'],
            ['name' => 'CRLV', 'description' => 'Certificado de Registro e Licenciamento de Veículo'],
            ['name' => 'NIF', 'description' => 'Número de Identificação Fiscal (para empresas estrangeiras)'],
            ['name' => 'CCM', 'description' => 'Cadastro de Contribuintes Mobiliários'],
            ['name' => 'CGC', 'description' => 'Cadastro Geral de Contribuintes'],
            ['name' => 'INSS', 'description' => 'Instituto Nacional do Seguro Social'],
            ['name' => 'CND', 'description' => 'Certidão Negativa de Débitos'],
            ['name' => 'Certificado Digital', 'description' => 'Certificado Digital para Assinatura Eletrônica'],
            ['name' => 'Laudo de Vistoria', 'description' => 'Laudo de Vistoria do Corpo de Bombeiros'],
            ['name' => 'Licença Ambiental', 'description' => 'Licença Ambiental da Empresa'],
            ['name' => 'Certificado de Regularidade FGTS', 'description' => 'Certificado de Regularidade do Fundo de Garantia do Tempo de Serviço'],
            ['name' => 'Certificado do Corpo de Bombeiros', 'description' => 'Certificado do Corpo de Bombeiros'],
            ['name' => 'Certificado de Origem', 'description' => 'Certificado de Origem de Mercadorias'],
            ['name' => 'Certificado de Aprovação', 'description' => 'Certificado de Aprovação de Equipamento'],
            ['name' => 'Certidão de Tributos Federais', 'description' => 'Certidão de Regularidade de Tributos Federais'],
            ['name' => 'Laudo de Análise de Água', 'description' => 'Laudo de Análise de Qualidade da Água'],
            // Adicione outros tipos de documentos para pessoa jurídica aqui
        ]);
    }
}
