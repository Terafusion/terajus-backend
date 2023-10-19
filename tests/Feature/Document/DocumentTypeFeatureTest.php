<?php

namespace Tests\Feature\Document;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Laravel\Passport\Passport;
use Tests\TestCase;

class DocumentTypeFeatureTest extends TestCase
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
        $this->artisan('db:seed --class=DocumentTypesSeeder');
        Passport::actingAs($this->user);
    }

    /**
     * Test retrieve all documents and filters
     * 
     * @return void
     */
    public function test_index_document_types()
    {
        $this->get('api/document-types')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'CNH']);
        $this->get('api/document-types?filter[name]=xpto')->assertStatus(Response::HTTP_OK)->assertJsonCount(0);
        $this->get('api/document-types?filter[name]=rg')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'RG']);
    }
}
