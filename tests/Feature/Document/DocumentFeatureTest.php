<?php
namespace Tests\Feature\Document;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DocumentFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_create_a_document()
    {
        Storage::fake('s3');

        $file = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');

        $documentData = [
            'file' => $file,
            'model_type' => 'App\Models\Customer\Customer',
            'model_id' => '1',
            'document_type_id' => '1',
            'description' => 'eae',
        ];

        $response = $this->postJson('/api/documents', $documentData);

        $response->assertStatus(201);

        $fileName = $response->json('file_name');
        $filePath = $response->json('file_path');

        Storage::disk('s3')->assertExists($filePath);
    }

        /** @test */
        public function test_can_download_a_document()
        {
            Storage::fake('s3');
    
            $file = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
    
            $documentData = [
                'file' => $file,
                'model_type' => 'App\Models\Customer\Customer',
                'model_id' => '1',
                'document_type_id' => '1',
                'description' => 'eae',
            ];
    
            $response = $this->postJson('/api/documents', $documentData);
            $response->assertStatus(201);
    
            $documentId = $response->json('id');

            $downloadResponse = $this->getJson("/api/documents/{$documentId}/download");
            $downloadResponse->assertStatus(200);
        }
}