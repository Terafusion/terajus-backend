<?php

namespace Tests\Feature\LegalCase;

use App\Enums\LegalCaseStatusEnum;
use App\Models\Document\Document;
use App\Models\Evidence\Evidence;
use App\Models\LegalCase\LegalCase;
use App\Models\LegalCase\LegalCaseParticipant;
use App\Models\User\User;
use App\Services\ArtificialIntelligence\ArtificialIntelligenceService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Laravel\Passport\Passport;
use Tests\TestCase;
use OpenAI\Laravel\Facades\OpenAI;
use OpenAI\Resources\Chat;
use OpenAI\Responses\Chat\CreateResponse;

class LegalCaseFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @var User */
    private $user;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Passport::actingAs($this->user);
    }

    /**
     * Test store an Legal Case
     *
     * @return void
     */
    public function test_store_legal_case()
    {
        $newPlaintiffUser = User::factory()->create();

        $this->post('api/legal-cases', [
            'case_type' => 'Test case type',
            'case_matter' => 'Test case matter',
            'case_description' => 'Test case description',
            'case_requests' => 'Test case request',
            'participants' => [
                0 => [
                'user_id' => $newPlaintiffUser->id,
                'participant_type_id' => 1
            ]]
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['case_type' => 'Test case type']);
    }

    public function test_generate_complaint()
    {
        $legalCase = LegalCase::factory()->laborlawCase()->create();
        $evidence = Evidence::factory()->create(['legal_case_id' => $legalCase->id]);
        $evidence = Evidence::factory()->create(['legal_case_id' => $legalCase->id]);
        Document::factory()->create(['model_id' => $evidence->id]);

        LegalCaseParticipant::factory()->plaintiff()->create(['legal_case_id' => $legalCase->id]);
        LegalCaseParticipant::factory()->defendant()->create(['legal_case_id' => $legalCase->id]);

        $artificialIntelligenceService = App::make(ArtificialIntelligenceService::class);
        $prompt = $artificialIntelligenceService->getPrompt($legalCase);

        $client = OpenAI::fake([
            CreateResponse::fake([
                'choices' => [
                    [
                        'text' => $legalCase->description,
                    ],
                ],
            ]),
        ]);

        $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ],
            ],
        ]);

        $this->assertNull($legalCase->complaint);
        $this->put('api/legal-cases/' . $legalCase->id, ['status' => LegalCaseStatusEnum::COMPLAINT_GENERATION])->assertStatus(Response::HTTP_OK);
        $legalCase->refresh();
        $this->assertEquals(LegalCaseStatusEnum::COMPLAINT_GENERATION, $legalCase->status);
        $this->assertNotNull($legalCase->complaint);

        $client->assertSent(Chat::class);
    }

    public function test_update_legal_case()
    {
        $legalCase = LegalCase::factory()->laborlawCase()->create();
        $oldPlaintiffUser = User::factory()->create();
        $newPlaintiffUser = User::factory()->create();
        LegalCaseParticipant::factory()->plaintiff()->create(['user_id' => $oldPlaintiffUser->id, 'legal_case_id' => $legalCase->id]);

        $this->put('api/legal-cases/' . $legalCase->id, ['case_description' => 'test case description'])->assertStatus(Response::HTTP_OK);
        $legalCase->refresh();
        $this->assertEquals('test case description', $legalCase->case_description);

        $this->assertDatabaseHas('legal_case_participants', [
            'legal_case_id' => $legalCase->id,
            'user_id' => $oldPlaintiffUser->id
        ]);

        $this->put('api/legal-cases/' . $legalCase->id, ['participants' => [0 => [
            'user_id' => $newPlaintiffUser->id,
            'participant_type_id' => 1
        ]]])->assertStatus(Response::HTTP_OK);

        $this->assertSoftDeleted('legal_case_participants', [
            'legal_case_id' => $legalCase->id,
            'user_id' => $oldPlaintiffUser->id
        ]);

        $this->assertDatabaseHas('legal_case_participants', [
            'legal_case_id' => $legalCase->id,
            'user_id' => $newPlaintiffUser->id
        ]);
    }
}
