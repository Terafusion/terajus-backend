<?php

namespace Tests\Feature\Document;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DocumentTypeFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieve all documents and filters
     *
     * @return void
     */
    public function test_index_document_types()
    {
        $this->get('api/document-types')->assertStatus(Response::HTTP_OK)->assertJsonFragment(['name' => 'CNH']);
    }
}
