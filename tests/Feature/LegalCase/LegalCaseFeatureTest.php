<?php

namespace Tests\Feature\LegalCase;

use App\Models\LegalCase\LegalCase;
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
        $plaintiff = User::factory()->create(['name' => 'plaintiff']);
        $defendant = User::factory()->create(['name' => 'defendant']);
        $this->post('api/legal-cases', [
            'plaintiff_id' => $plaintiff->id,
            'defendant_id' => $defendant->id,
            'case_type' => 'Test case type',
            'case_matter' => 'Test case matter',
            'case_description' => 'Test case description',
            'case_requests' => 'Test case request'
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['case_type' => 'Test case type']);
    }
}
