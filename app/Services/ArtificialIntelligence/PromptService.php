<?php

namespace App\Services\ArtificialIntelligence;

use App\Models\Customer\Customer;
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

    public function setClaim(string $value)
    {
        $this->data['claim'] = $value;

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

    public function setPlaintiffs(array $value)
    {
        $this->data['plaintiffs'] = Customer::findMany($value);

        return $this;
    }

    public function setDefendants(array $value)
    {
        $this->data['defendants'] = Customer::findMany($value);

        return $this;
    }

    public function setLawyers(array $value)
    {
        $this->data['lawyers'] = User::findMany($value);

        return $this;
    }

    public function setCaseRequests(string $value)
    {
        $this->data['case_requests'] = $value;

        return $this;
    }

    public function buildComplaint()
    {
        $text = "
        Você é um assistente de advogado designado para escrever petições de alta qualidade.
        Gere um texto de petição inicial formatada em HTML, com as seguintes especificações:
        Use as tags <br> para quebrar linhas. Use as tags do HTML para formatar a resposta;
        Tudo que está em inglês, exceto nomes próprios, devem ser traduzidos para o português;
        Use termos da área jurídica e as leis vigintes da constituição brasileira para embasar os argumentos;";

        $text .=

            "Polo Ativo: (monte um texto de qualificação baseado em petições reais)";

        foreach ($this->data['plaintiffs'] as $plaintiff) {
            $text .= "
        Nome: {$plaintiff->name}
        Tipo de pessoa: {$plaintiff->person_type}
        Endereço: {$plaintiff->address}
        CPF se for pessoa física, ou CNPJ se for jurídica: {$plaintiff->nif_number}
        RG se for pessoa física, ou ignore se for jurídica: {$plaintiff->registration_number}
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$plaintiff->marital_status}
        Profissão se for pessoa física, ou ignore se for jurídica: {$plaintiff->occupation}
        Genero se for pessoa física, ou ignore se for jurídica: {$plaintiff->gender}";

            $text .=
                "Polo Passivo: (monte um texto de qualificação baseado em petições reais)";

            foreach ($this->data['defendants'] as $defendant) {
                $text .= "
        Nome: {$defendant->name}
        Tipo de pessoa: {$defendant->person_type}
        Endereço: {$defendant->address}
        CPF se for pessoa física, ou CNPJ se for jurídica: {$defendant->nif_number}
        RG se for pessoa física, ou ignore se for jurídica: {$defendant->registration_number}
        Estado Civil se for pessoa física, ou ignore se for jurídica: {$defendant->marital_status}
        Profissão se for pessoa física, ou ignore se for jurídica: {$defendant->occupation}
        Genero se for pessoa física, ou ignore se for jurídica: {$defendant->gender}";

                $text .=
                    "ATENÇÃO: Tribunal: {$this->data['court']}
        ATENÇÃO: Área do direito: {$this->data['fields_of_law']}\n";

                $text .= "Classe processual (Para que você possa se respaldar juridicamente e se basear) : {$this->data['case_type']}.\n";
                $text .= "Assunto(s) (Para que você possa se respaldar juridicamente e se basear) : {$this->data['case_matter']}.\n";
                $text .= "Para se basear na seção de fatos, fundamentos legais, pedidos,dentre outras coisas, veja a narrativa abaixo que foi fornecida por um advogado: (Argumente de maneira detalhada e robusta): {$this->data['claim']}.\n";
                $text .= "Crie a seção de provas mas não precisa preencher.:\n";

                // foreach ($this->data['evidences'] as $k => $evidence) {
                //     $text .= "ID#{$evidence['legal_case_reference']} - {$evidence['description']}";
                // }

                $text .= "Estes são os pedidos que você irá fazer ao juiz:";

                // foreach ($this->data['case_requests'] as $k => $request) {
                //     $text .= "$request\n";
                // }

                $text .= 'Data da petição: ' . Carbon::now()->format('d/m/Y');
                $text .= "\n";

                $text .= 'Advogado(s) que está(ão) representando o(s) polo(s) ativo(s): ';

                foreach ($this->data['lawyers'] as $lawyer) {
                    $text .= $lawyer->name . ', ' . $lawyer->nif_number;
                    $text .= "\n";
                }
                $text .= "\n";

                $text .= 'ATENÇÃO: não repita os textos acima, utilize eles para criar uma petição inicial de alta qualidade acrescentando o máximo possível de conteúdo relevante.';

                return $text;
            }
        }
    }
}
