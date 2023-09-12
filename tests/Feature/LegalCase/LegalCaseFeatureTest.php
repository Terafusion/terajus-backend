<?php

namespace Tests\Feature\LegalCase;

use App\Enums\LegalCaseStatusEnum;
use App\Models\Document\Document;
use App\Models\Evidence\Evidence;
use App\Models\LegalCase\LegalCase;
use App\Models\LegalCase\LegalCaseParticipant;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

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
        $this->post('api/legal-cases', [
            'case_type' => 'Test case type',
            'case_matter' => 'Test case matter',
            'case_description' => 'Test case description',
            'case_requests' => 'Test case request'
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

        $this->assertNull($legalCase->complaint);
        $this->put('api/legal-cases/' . $legalCase->id, ['status' => LegalCaseStatusEnum::COMPLAINT_GENERATION])->assertStatus(Response::HTTP_OK);
        $this->assertEquals(LegalCaseStatusEnum::COMPLAINT_GENERATION, $legalCase->status);
        $this->assertNotNull($legalCase->complaint);
    }
}
