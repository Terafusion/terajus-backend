<?php

namespace App\Services\DocumentType;

use App\Repositories\DocumentType\DocumentTypeRepository;
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
