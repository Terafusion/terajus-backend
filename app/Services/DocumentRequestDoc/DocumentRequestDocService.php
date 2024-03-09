<?php

namespace App\Services\DocumentRequestDoc;

use App\Models\DocumentRequestDoc\DocumentRequestDoc;
use App\Repositories\DocumentRequestDoc\DocumentRequestDocRepository;
use Illuminate\Database\Eloquent\Collection;

class DocumentRequestDocService
{
    public function __construct(private DocumentRequestDocRepository $documentRequestDocRepository)
    {
    }

    /**
     * Create a new Document Request Doc register
     */
    public function store(array $data, int $documentRequestId)
    {
        foreach ($data['documents'] as $document) {
            $this->documentRequestDocRepository->create([
                'document_request_id' => $documentRequestId,
                'document_type_id' => $document['document_type_id'],
                'description' => $document['description'],
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
        return $this->documentRequestDocRepository->getAll();
    }

    public function getById(int $id): DocumentRequestDoc
    {
        return $this->documentRequestDocRepository->find($id);
    }

    public function update(array $data, int $id): DocumentRequestDoc
    {
        return $this->documentRequestDocRepository->update($data, $id);
    }

    public function updateAllByDocumentRequest(int $documentRequestId, array $data)
    {
        return $this->documentRequestDocRepository->where('document_request_id', $documentRequestId)->update($data);
    }
}
