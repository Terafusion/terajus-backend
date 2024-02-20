<?php

namespace Tests\Feature\Document;

use App\Enums\DocumentRequestStatusEnum;
use App\Models\DocumentRequest\DocumentRequest;
use App\Models\DocumentRequestDoc\DocumentRequestDoc;
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
        $this->artisan('db:seed');
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

    public function test_get_document_requests()
    {
        $documentRequest = DocumentRequest::factory()->create();
        DocumentRequestDoc::factory()->create(['document_request_id' => $documentRequest->id]);
        $this->get('api/document-requests')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['status' => DocumentRequestStatusEnum::PENDING]);
        $this->get('api/document-requests/' . $documentRequest->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['status' => DocumentRequestStatusEnum::PENDING]);
    }

    public function test_filters_document_requests()
    {
        $user = User::factory()->create();
        $client = User::factory()->create();
        $documentRequest = DocumentRequest::factory()->create(['user_id' => $user->id, 'client_id' => $client->id]);
        DocumentRequest::factory()->create();
        DocumentRequestDoc::factory()->create(['document_request_id' => $documentRequest->id]);

        $this->get('api/document-requests?filter[user_id]=' . $user->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['status' => DocumentRequestStatusEnum::PENDING]);
        $this->get('api/document-requests?filter[client_id]=' . $client->id)->assertStatus(Response::HTTP_OK)->assertJsonFragment(['status' => DocumentRequestStatusEnum::PENDING]);
    }
}
