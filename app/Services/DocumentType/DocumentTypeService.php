<?php

namespace App\Services\DocumentType;

use App\Repositories\DocumentType\DocumentTypeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class DocumentTypeService
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->documentTypeRepository->getAll();
    }
}
