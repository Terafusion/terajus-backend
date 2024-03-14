<?php

namespace App\Services\LegalPleadingType;

use App\Repositories\LegalPleadingType\LegalPleadingTypeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LegalPleadingTypeService
{
    public function __construct(private LegalPleadingTypeRepository $LegalPleadingTypeRepository)
    {
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->LegalPleadingTypeRepository->getAll();
    }
}
