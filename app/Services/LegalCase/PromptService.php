<?php

namespace App\Services\LegalCase;

use App\Models\LegalCase\LegalCaseParticipant;
use App\Models\User\User;
use Carbon\Carbon;

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
        $this->data['plaintiff'] = $value->customer;
        return $this;
    }

    public function setDefendant(LegalCaseParticipant $value)
    {
        $this->data['defendant'] = $value->customer;
        return $this;
    }

    public function setProfessional(User $value)
    {
        $this->data['professional'] = $value;

        return $this;
    }

    public function setCaseRequests(string $value)
    {
        $this->data['case_requests'] = $value;

        return $this;
    }

    public function build()
    {
        $text = "
        Você é um assistente de advogado designado para escrever petições de alta qualidade.
        Gere um texto de petição inicial formatada em HTML, com as seguintes especificações:
        Use as tags <br> para quebrar linhas. Use as tags do HTML para formatar a resposta;
        Tudo que está em inglês, exceto nomes próprios, devem ser traduzidos para o português;
        Use termos da área jurídica e as leis vigintes da constituição brasileira para embasar os argumentos;
        
        Polo Ativo: (monte um texto de qualificação baseado em petições reais:)
        Nome: {$this->data['plaintiff']->name}
        Tipo de pessoa: {$this->data['plaintiff']->person_type}
        Endereço: {$this->data['plaintiff']->address}
        CPF se for pessoa física, ou CNPJ se for jurídica: {$this->data['plaintiff']->nif_number}
        RG se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->registration_number}
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->marital_status}
        Profissão se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->occupation}
        Genero se for pessoa física, ou ignore se for jurídica: {$this->data['plaintiff']->gender}

        Polo Passivo: (monte um texto de qualificação baseado em petições reais:)
        Nome: {$this->data['defendant']->name}
        Tipo de pessoa: {$this->data['defendant']->person_type}
        Endereço: {$this->data['defendant']->address}
        CPF se for pessoa física, ou CNPJ se for jurídica: {$this->data['defendant']->nif_number}
        RG se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->registration_number}
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->marital_status}
        Profissão se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->occupation}
        Genero se for pessoa física, ou ignore se for jurídica: {$this->data['defendant']->gender}

        ATENÇÃO: Tribunal: {$this->data['court']}
        ATENÇÃO: Área do direito: {$this->data['fields_of_law']}\n";

        $text .= "Classes (Para que você possa se respaldar juridicamente e se basear) : {$this->data['case_type']}.\n";
        $text .= "Assuntos (Para que você possa se respaldar juridicamente e se basear) : {$this->data['case_matter']}.\n";
        $text .= "Descrição dos fatos (Argumente de maneira detalhada e robusta): {$this->data['case_description']}.\n";
        $text .= "Na seção de provas, deve-se fazer referência a provas e anexos:\n";

        foreach ($this->data['evidences'] as $k => $evidence) {
            $text .= "ID#{$evidence['legal_case_reference']} - {$evidence['description']}";
        }

        $text .= "\n";

        $text .= "Estes são os pedidos que você irá fazer ao juiz: {$this->data['case_requests']}.\nArgumente da melhor maneira possível. \n";

        $text .= 'Data da petição: '.Carbon::now()->format('d/m/Y');
        $text .= "\n";

        $text .= 'Advogado que está fazendo a petição: '.$this->data['professional']->name;
        $text .= "\n";

        $text .= 'ATENÇÃO: não repita os textos acima, utilize eles para criar uma petição inicial de alta qualidade acrescentando o máximo possível de conteúdo relevante.';

        return $text;
    }
}
