<?php

namespace App\Services\LegalPleading;

use App\Repositories\LegalPleading\LegalPleadingRepository;
use App\Strategies\LegalPleadingStrategy;

class LegalPleadingService
{
    public function __construct(
        protected LegalPleadingStrategy $strategy,
        private LegalPleadingRepository $legalPleadingRepository,
    ) {
    }

    public function store($data)
    {
        $this->strategy->resolve($data['slug'], $data);
        return $this->strategy->handle();
    }


    public function show($uuid)
    {
        return $this->legalPleadingRepository->findByUuid($uuid);
    }

    public function getAll()
    {
        return $this->legalPleadingRepository->getAll();
    }

    public function update($data, $uuid)
    {
        $legalPleading = $this->legalPleadingRepository->where('uuid', $uuid)->firstOrFail();
        $legalPleading->update($data);
        return $legalPleading;
    }
}