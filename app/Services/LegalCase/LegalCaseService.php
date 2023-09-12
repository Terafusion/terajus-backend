<?php

namespace App\Services\LegalCase;

use App\Enums\LegalCaseStatusEnum;
use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
use App\Repositories\LegalCase\LegalCaseRepository;
use App\Services\ArtificialIntelligence\ArtificialIntelligenceService;
use Illuminate\Support\Collection;

class LegalCaseService
{
    /** @var ArtificialIntelligenceService */
    private $artificialIntelligenceService;

    /** @var LegalCaseRepository */
    private $legalCaseRepository;

    public function __construct(ArtificialIntelligenceService $artificialIntelligenceService, LegalCaseRepository $legalCaseRepository)
    {
        $this->artificialIntelligenceService = $artificialIntelligenceService;
        $this->legalCaseRepository = $legalCaseRepository;
    }

    /**
     * Get an legalCase instance by ID
     * 
     * @param LegalCase $legalCase
     * @return LegalCase
     */
    public function getById($legalCase)
    {
        return $this->legalCaseRepository->find($legalCase->id);
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->legalCaseRepository->all();
    }

    /**
     * Store a new LegalCase resource
     * 
     * @param array $data
     * @param User $user
     * @return LegalCase
     */
    public function store(array $data, User $user)
    {
        $data['user_id'] = $user->id;
        $data['status'] ?? LegalCaseStatusEnum::DRAFT;
        return $this->legalCaseRepository->create($data);
    }

    /**
     * Update a LegalCase resource
     * 
     * @param array $data
     * @param LegalCase $legalCase
     * @return LegalCase
     */
    public function update(array $data, LegalCase $legalCase)
    {
        if ($data['status'] === LegalCaseStatusEnum::COMPLAINT_GENERATION) {
            $data['complaint'] = $this->artificialIntelligenceService->getComplaint($legalCase);
        }

        return $this->legalCaseRepository->update($data, $legalCase->id);
    }
}
