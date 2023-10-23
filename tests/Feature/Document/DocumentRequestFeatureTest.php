<?php

namespace Tests\Feature\Document;

use App\Enums\DocumentRequestStatusEnum;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DocumentRequestFeatureTest extends TestCase
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
     * Test store an Document Request
     *
     * @return void
     */
    public function test_store_document_requests()
    {
        $client = User::factory()->create();

        $this->post('api/document-requests', [
            'client_id' => $client->id,
            'documents' => [
                0 => ['document_type_id' => 1],
                1 => ['document_type_id' => 4],
            ]
        ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(['status' => DocumentRequestStatusEnum::PENDING]);
    }
}
