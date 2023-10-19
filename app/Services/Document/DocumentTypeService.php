<?php

namespace App\Services\Document;

use App\Models\Document\DocumentType;
use App\Repositories\Document\DocumentTypeRepository;
use Illuminate\Database\Eloquent\Collection;

class DocumentTypeService
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->documentTypeRepository->getAll();
    }
}
