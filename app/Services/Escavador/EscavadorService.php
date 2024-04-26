<?php

namespace App\Services\Escavador;

use GuzzleHttp\Client;

class EscavadorService
{
    public function __construct(private Client $client)
    {
        // $this->client = new Client([
        //     'base_uri' => getenv('API_ESCAVADOR_URL'),
        //     'headers' => [
        //         "Authorization" => "Bearer " . getenv('API_ESCAVADOR_TOKEN'),
        //         "X-Requested-With" => "XMLHttpRequest",
        //     ],
        // ]);

        $this->client = new Client([
            'headers' => [
                "Authorization" => "Bearer " . getenv('API_ESCAVADOR_TOKEN'),
                "X-Requested-With" => "XMLHttpRequest",
            ],
        ]);
    }

    public function getLegalCaseByCnjNumber($numeroCnj)
    {
        //$response = $this->client->get("/processos/numero_cnj/{$numeroCnj}");
        $response = $this->client->get("https://9eb1b172a6be4e24b6bee872247731c8.api.mockbin.io");

        $body = $response->getBody();

        return json_decode((string) $body);
    }

    public function getHistoricByCnjNumber($numeroCnj)
    {
        //$response = $this->client->get("/processos/numero_cnj/{$numeroCnj}/movimentacoes");
        $response = $this->client->get("https://a0e43ca6b3474956913029e632c94473.api.mockbin.io");

        $body = $response->getBody();

        return json_decode((string) $body);
    }


}