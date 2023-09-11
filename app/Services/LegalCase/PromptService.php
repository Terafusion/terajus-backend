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

        Gere um texto de petição inicial, onde as informações variáveis, como parte passiva, parte ativa, valor da causa, etc, venham todas entre colchetes e as palavras separadas em snake_case (com underline), as palavras das variaviais devem estar em uppercase. 
        No final do texto NÃO adicione um espaço para assinatura.\n
        
        Abaixo seguem as especificações da petição inicial:\n
        Como você deve se referenciar à parte ativa:\n
        Nome: {$this->data['plaintiff']->name}\n

        Como você deve se referenciar à parte passiva: #1598\n
        Nome: {$this->data['defendant']->name}\n

        Tribunal: {$this->data['court']}\n
        Área do direito: {$this->data['fields_of_law']}\n";


        $text .= "Classe: {$this->data['case_matter']}\n";
        $text .= "Assunto: {$this->data['case_type']}\n";
        $text .= "Descrição: {$this->data['case_description']}\n";
        $text .= "Na seção de provas, deve-se fazer referência a provas e anexos:\n";

        foreach ($this->data['evidences'] as $k => $evidence) {
            $text .= "ID#{$evidence['legal_case_reference']} - {$evidence['description']}\n";
        }

        return $text;
    }
}
