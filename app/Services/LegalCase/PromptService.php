<?php

namespace App\Services\LegalCase;

use App\Models\LegalCase\LegalCaseParticipant;
use App\Models\User\User;

class PromptService
{
    private $data = [];

    public function setCaseType(string $value)
    {
        $this->data['case_type'] = $value;
        return $this;
    }
    public function setCaseMatter(string $value)
    {
        $this->data['case_matter'] = $value;
        return $this;
    }

    public function setDescription(string $value)
    {
        $this->data['case_description'] = $value;
        return $this;
    }

    public function setCourt(string $value)
    {
        $this->data['court'] = $value;
        return $this;
    }

    public function setFieldsOfLaw(string $value)
    {
        $this->data['fields_of_law'] = $value;
        return $this;
    }

    public function setEvidences(mixed $value)
    {
        $this->data['evidences'] = $value;
        return $this;
    }

    public function setPlaintiff(LegalCaseParticipant $value)
    {
        $this->data['plaintiff'] = $value->user;
        return $this;
    }

    public function setDefendant(LegalCaseParticipant $value)
    {
        $this->data['defendant'] = $value->user;
        return $this;
    }

    public function build()
    {
        $text = "Você é um assistente de advogado designado para escrever petições de alta qualidade:\n

        Gere um texto de petição inicial formatado em html, com as seguintes especificações:\n

        Use as tags h5, p;
        Tudo que está em inglês, exceto nomes próprios, devem ser traduzidos para o português;\n
        No final do texto não adicione um espaço para assinatura;
        use termos da área juridica e as leis vigintes da constituição brasileira para embasar os argumentos;

        IMPORTANTE: não repita os textos abaixo, use eles para criar uma petição inicial com suas palavras;
        abaixo estão as informações que você deve usar para criar a petição;

        Qualificação da parte ativa:\n
        Nome: {$this->data['plaintiff']->name}\n
        Tipo de pessoa: {$this->data['plaintiff']->person_type}\n
        Endereço: {$this->data['plaintiff']->address}\n
        CPF se for pessoa física, ou CNPJ se for jurídica: {$this->data['plaintiff']->nif_number}\n
        RG se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->registration_number}\n
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->marital_status}\n
        Profissão se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->occupation}\n
        Genero se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->gender}\n

        Qualificação da parte passiva:\n
        Nome: {$this->data['defendant']->name}\n
        Tipo de pessoa: {$this->data['defendant']->person_type}\n
        Endereço: {$this->data['defendant']->address}\n
        CPF se for pessoa física, ou CNPJ se for jurídica: {$this->data['defendant']->nif_number}\n
        RG se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->registration_number}\n
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->marital_status}\n
        Profissão se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->occupation}\n
        Genero se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->gender}\n

        ATENÇÃO: Tribunal: {$this->data['court']}\n
        ATENÇÃO: Área do direito: {$this->data['fields_of_law']}\n";


        $text .= "Classe: {$this->data['case_matter']}\n";
        $text .= "Assunto: {$this->data['case_type']}\n";
        $text .= "Descrição dos fatos: {$this->data['case_description']}\n";
        $text .= "Na seção de provas, deve-se fazer referência a provas e anexos:\n";

        foreach ($this->data['evidences'] as $k => $evidence) {
            $text .= "ID#{$evidence['legal_case_reference']} - {$evidence['description']}\n";
        }

        $text .=
        "
            IMPORTANTE: não repita os textos acima, use eles para criar uma petição inicial com suas palavras;
        ";

        return $text;
    }
}
