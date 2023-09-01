<?php

namespace App\Services\LegalCase;


class PromptService
{
    private $data = [];

    public function setCaseType($value)
    {
        $this->data['case_type'] = $value;
        return $this;
    }
    public function setCaseMatter($value)
    {
        $this->data['case_matter'] = $value;
        return $this;
    }

    public function setDescription($value)
    {
        $this->data['case_description'] = $value;
        return $this;
    }

    public function build()
    {
        $text = "Você é um assistente de advogado designado para escrever petições de alta qualidade:\n

        Gere um texto de petição inicial, onde as informações variáveis, como parte passiva, parte ativa, valor da causa, etc, venham todas entre colchetes e as palavras separadas em snake_case (com underline), as palavras das variaviais devem estar em uppercase. 
        No final do texto NÃO adicione um espaço para assinatura.\n
        
        Abaixo seguem as especificações da petição inicial:\n
        Como você deve se referenciar à parte ativa: #2654\n
        Como você deve se referenciar à parte passiva: #1598\n
        Tribunal: Tribunal Regional Federal da 1ª Região\n
        Área do direito: Direito do Trabalho\n";


        $text .= "Classe: {$this->data['case_matter']}\n";
        $text .= "Assunto: {$this->data['case_type']}\n";
        $text .= "Descrição: {$this->data['case_description']}\n";

        $text .= "Na seção de provas, deve-se fazer referência a provas e anexos:\n";
        $text.= "anexo-1 refere-se ao contrato assinado entre as partes\n
        anexo-2 refere-se a imagens comprovando a atuação da parte passiva na empresa\n
        anexo-3 refere-se a um audio onde a parte passiva fala para outro colega de trabalho que está copiando o projeto de software para fontes externas.";

        //foreach($)
        // Adicione outros campos aqui, se necessário

        return $text;
    }
}
