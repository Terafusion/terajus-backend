<?php

namespace Tests\Feature\DocumentRequest;

use Tests\TestCase;
use App\Models\Customer\Customer;
use App\Models\DocumentRequest\DocumentRequest;
use App\Models\DocumentRequestDoc\DocumentRequestDoc;
use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;

class DocumentRequestFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test store a document request when user is associated with a tenant
     *
     * @return void
     */
    public function test_store_document_request_with_tenant_association()
    {
        $customer = Customer::factory()->create(['tenant_id' => $this->user->tenant_id]);

        $response = $this->post('api/document-requests', [
            'customer_id' => $customer->id,
            'documents' => [
                ['document_type_id' => 1, 'description' => 'teste'],
                ['document_type_id' => 4, 'description' => 'enviar docs'],
            ]
        ]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'id',
                'status',
                'user_id',
                'customer_id',
                'user',
                'customer',
                'requested_documents',
                'created_at',
                'updated_at',
            ]);
    }    

        /**
     * Test store a document request when user is associated with a tenant
     *
     * @return void
     */
    public function test_get_document_when_user_belongs_to_default_tenant()
    {
        $tenant = Tenant::find(config('terajus.default_tenant.id'));
        $user = User::factory()->create(['tenant_id' => $tenant->id]);
        
        $customer = Customer::factory()->create(['tenant_id' => $this->user->tenant_id]);
        $documentRequest = DocumentRequest::factory()->create(['user_id' => $this->user->id, 'tenant_id' => $this->user->tenant_id, 'customer_id' => $customer->id]);
        
        $this->get('api/document-requests')->assertStatus(Response::HTTP_OK)->assertJsonFragment($documentRequest->toArray());
    }

    /**
     * Test store a document request when customer not belongs to tenant
     *
     * @return void
     */
    public function test_store_document_request_with_invalid_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->postJson('/api/document-requests', [
            'customer_id' => $customer->id,
            'documents' => [
                [
                    'document_type_id' => 1,
                    'description' => 'teste'
                ],
                [
                    'document_type_id' => 4,
                    'description' => 'enviar docs'
                ]
            ]
        ]);
        $response->assertStatus(422);
    }

    /**
     * Test update a document request
     *
     * @return void
     */
    public function test_update_document_request()
    {
        $documentRequest = DocumentRequest::factory()->create(['tenant_id' => $this->user->tenant_id]);
        $documentRequestDoc = DocumentRequestDoc::factory()->create(['document_request_id' => $documentRequest->id]);
        $response = $this->put('api/document-requests/' . $documentRequest->id, [
            'status' => 'COMPLETED',
            'document_request_docs' => [
                ['id' => $documentRequestDoc->id, 'status' => 'COMPLETED']
            ]
        ]);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['status' => 'COMPLETED']);
    }
}
