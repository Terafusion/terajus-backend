<?php

namespace App\Services\DocumentType;

use App\Models\User\User;
use App\Repositories\DocumentType\DocumentTypeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->documentTypeRepository->getAll($user);
    }
}
