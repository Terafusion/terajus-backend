<?php

namespace App\Services\LegalPleading;

use App\Models\LegalPleading\LegalPleading;
use App\Models\User\User;
use App\Repositories\LegalPleading\LegalPleadingRepository;
use App\Services\ArtificialIntelligence\ArtificialIntelligenceService;
use App\Services\User\UserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LegalPleadingService
{
    public function __construct(
        private ArtificialIntelligenceService $artificialIntelligenceService,
        private UserService $userService,
        private LegalPleadingRepository $legalPleadingRepository,
    ) {
    }

    /**
     * Get an LegalPleading instance by ID
     *
     * @param  LegalPleading  $legalPleading
     * @return LegalPleading
     */
    public function getById($legalPleading)
    {
        return $this->legalPleadingRepository->find($legalPleading->id);
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->legalPleadingRepository->getAll($user);
    }

    /**
     * Store a new LegalPleading resource
     *
     * @return LegalPleading
     */
    public function store(array $data, User $user)
    {
        //
    }

    /**
     * Update a LegalPleading resource
     *
     * @return LegalPleading
     */
    public function update(array $data, LegalPleading $legalPleading)
    {
        //
    }
}
