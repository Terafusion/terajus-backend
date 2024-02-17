<?php

namespace App\Services\DocumentRequestDoc;

use App\Repositories\DocumentRequestDoc\DocumentRequestDocRepository;
use Illuminate\Database\Eloquent\Collection;

class DocumentRequestDocService
{
    public function __construct(private DocumentRequestDocRepository $documentRequestDocRepository)
    {
    }

    /**
     * Create a new Document Request Doc register
     * 
     * @param array $data
     * @param int $documentRequestId
     */
    public function store(array $data, int $documentRequestId)
    {
        foreach ($data['documents'] as $document) {
            $this->documentRequestDocRepository->create([
                'document_request_id' => $documentRequestId,
                'document_type_id' => $document['document_type_id']
            ]);
        }
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->documentRequestRepository->getAll();
    }
}
