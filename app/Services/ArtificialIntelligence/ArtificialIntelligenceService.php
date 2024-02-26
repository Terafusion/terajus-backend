<?php

namespace App\Services\ArtificialIntelligence;

use App\Models\LegalCase\LegalCase;
use App\Services\LegalCase\PromptService;
use OpenAI;

class ArtificialIntelligenceService
{
    /** @var OpenAI\Client */
    private $client;

    /** @var PromptService */
    private $promptService;

    public function __construct(PromptService $promptService)
    {
        $this->client = OpenAI::client(getenv('OPENAI_API_KEY'));
        $this->promptService = $promptService;
    }

    public function getComplaint(LegalCase $legalCase)
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-4-turbo-preview',
            'messages' => [
                ['role' => 'user', 'content' => $this->getPrompt($legalCase)],
            ],
        ]);

         dd($response->choices[0]->message->content);
    }

    /**
     * Get complaint generated by IA
     * 
     * @param LegalCase $legalCase
     * @return string
     */
    public function getPrompt(LegalCase $legalCase)
    {
        return $this->promptService
            ->setCaseType($legalCase->case_type)
            ->setCaseMatter($legalCase->case_matter)
            ->setPlaintiff($legalCase->plaintiff[0])
            ->setDefendant($legalCase->defendant[0])
            ->setDescription($legalCase->case_description)
            ->setCourt($legalCase->court)
            ->setFieldsOfLaw($legalCase->fields_of_law)
            ->setEvidences($legalCase->evidences)
            ->setCaseRequests($legalCase->case_requests)
            ->setProfessional($legalCase->user)
            ->build();
    }
}
