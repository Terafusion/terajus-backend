<?php

namespace App\Services\ArtificialIntelligence;

use App\Helpers\HtmlHelper;
use Illuminate\Support\Facades\App;
use OpenAI;

class OpenAiService
{
  /** @var OpenAI\Client */
  private $client;

  private $promptService;

  public function __construct()
  {
      $this->client = OpenAI::client(getenv('OPENAI_API_KEY'));
  }

  public function generateLegalPleading(string $prompt)
  {
      if (!in_array(App::environment(), ['local','testing'])) {
          $response = $this->client->chat()->create([
              'model' => 'gpt-4-turbo-preview',
              'messages' => [
                  ['role' => 'user', 'content' => $prompt],
              ],
          ]);
          $response = $response->choices[0]->message->content;
      } else {
          $response = <<<HTML
          ```html\n<!DOCTYPE html>\n<html lang=\"pt-br\">\n<head>\n    <meta charset=\"UTF-8\">\n    <title>Petição Inicial - Dano Moral e Material</title>\n</head>\n<body>\n    <h2>EXCELENTÍSSIMO SENHOR DOUTOR JUIZ DE DIREITO DA VARA CÍVEL DO TRIBUNAL DE JUSTIÇA DO ESTADO DE SÃO PAULO</h2>\n    <br>\n    <p><b>Casado</b>, brasileiro(a), casado(a), portador do CPF nº 54966687321, RG nº 778984565664, residente e domiciliado(a) no endereço [inserir endereço], vem, respeitosamente, perante Vossa Excelência, por intermédio de seu advogado abaixo assinado, com fulcro no Direito Civil, em especial nos preceitos que tratam de Responsabilidade Civil, Dano Material e Moral (conforme dispõem os artigos 186, 187 e 927 do Código Civil), propor a presente</p>\n    <br>\n    <h3>AÇÃO DE INDENIZAÇÃO POR DANOS MORAIS E MATERIAIS</h3>\n    <br>\n    <p>em face de <b>Caio Melo</b>, brasileiro(a), casado(a), engenheiro(a), portador do CPF nº 42257730152, RG nº 907152, residente e domiciliado no endereço [inserir endereço], pelos motivos de fato e de direito a seguir expostos:</p>\n    <br>\n    <h3>I. DOS FATOS</h3>\n    <br>\n    <p>No dia [inserir data específica], o réu, <b>Caio Melo</b>, dirigiu-se à residência do autor, situada no endereço [inserir endereço do autor], onde, de forma inesperada e absolutamente reprovável, despiu-se em público, causando extremo constrangimento e abalo psicológico não somente ao autor, mas também aos presentes no local.</p>\n    <br>\n    <p>É imperioso salientar que tal ato imoral foi perpetrado no endereço privado do autor, sem qualquer consentimento deste, configurando invasão de privacidade e violação dos direitos da personalidade do mesmo.</p>\n    <br>\n    <h3>II. DO DIREITO</h3>\n    <br>\n    <p>A conduta do réu encontra-se tipificada como ato ilícito, nos termos dos artigos 186 e 187 do Código Civil, ao passo que a responsabilidade civil deste por danos morais e materiais encontra-se prevista no artigo 927 do mesmo diploma legal.</p>\n    <br>\n    <p>Desta forma, é indubitável o direito do autor à reparação pelos danos morais e materiais sofridos, uma vez comprovada a conduta ilícita do réu, o dano experimentado pelo autor e o nexo causal entre ambos.</p>\n    <br>\n    <h3>III. DAS PROVAS</h3>\n    <br>\n    <p>Como prova do alegado, junta-se à presente petição:<br>\n    - ID#65de85bb6c123: provas do ocorrido<br>\n    - ID#65de85bd8a6f0: imagem do réu cometendo o ato</p>\n    <br>\n    <h3>IV. DOS PEDIDOS</h3>\n    <br>\n    <p>Diante do exposto, requer-se a Vossa Excelência:</p>\n    <br>\n    <ul>\n        <li>A condenação do réu ao pagamento de indenização por danos morais, em valor a ser arbitrado por este douto Juízo, como forma de compensação pelas violações perpetradas;</li>\n        <li>A condenação do réu ao pagamento de indenização por danos materiais, pelos prejuízos efetivamente comprovados;</li>\n        <li>A retratação pública do réu, como forma de mitigar os danos à imagem e honra do autor;</li>\n    </ul>\n    <br>\n    <p>Protesta por todo o tipo de prova em direito admitidas, especialmente pelo depoimento pessoal do réu, oitiva de testemunhas, juntada de novos documentos, entre outros.</p>\n    <br>\n    <p>Dá-se à causa o valor de R$ [valor da causa].</p>\n    <br>\n    <p>Nestes Termos,<br>\n    Pede Deferimento.<br>\n    [Local], 28 de fevereiro de 2024.</p>\n    <br>\n    <p>_____________________________<br>\n    Advogado Teste<br>\n    OAB/SP nº [número de inscrição na OAB]</p>\n</body>\n</html>\n```
          HTML;
      }

      $response = HtmlHelper::trimIAHtmlResponse($response);
      $response = HtmlHelper::getHtmlInitialTag($response);
      $response = HtmlHelper::getHtmlFinalTag($response);

      return $response;
  }
}
