<?php

namespace App\Services\LegalCase;

use App\Enums\LegalCaseStatusEnum;
use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
use App\Repositories\LegalCase\LegalCaseParticipantRepository;
use App\Repositories\LegalCase\LegalCaseRepository;
use App\Services\ArtificialIntelligence\OpenAiService;
use App\Services\User\UserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LegalCaseService
{
    public function __construct(
        private OpenAiService $artificialIntelligenceService,
        private UserService $userService,
        private LegalCaseRepository $legalCaseRepository,
        private LegalCaseParticipantRepository $LegalCaseParticipantRepository
    ) {
    }

    /**
     * Get an legalCase instance by ID
     *
     * @param  LegalCase  $legalCase
     * @return LegalCase
     */
    public function getById($legalCase)
    {
        return $this->legalCaseRepository->find($legalCase->id);
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->legalCaseRepository->getAll($user);
    }

    /**
     * Store a new LegalCase resource
     *
     * @return LegalCase
     */
    public function store(array $data, User $user)
    {
        $data['user_id'] = $user->id;
        $data['status'] ?? LegalCaseStatusEnum::DRAFT;
        $legalCase = $this->legalCaseRepository->create($data);
        if (isset($data['participants']) && ! empty($data['participants'])) {
            $this->syncParticipants($legalCase, $data['participants']);
        }

        return $legalCase;
    }

    /**
     * Update a LegalCase resource
     *
     * @return LegalCase
     */
    public function update(array $data, LegalCase $legalCase)
    {
        if (isset($data['participants']) && ! empty($data['participants'])) {
            $this->syncParticipants($legalCase, $data['participants']);
        }

        if (isset($data['status']) && $data['status'] === LegalCaseStatusEnum::COMPLAINT_GENERATION) {
            $data['complaint'] = $this->artificialIntelligenceService->getComplaint($legalCase);
        }

        return $this->legalCaseRepository->update($data, $legalCase->id);
    }

    /**
     * Sync legal case participants
     *
     *
     * @return void
     */
    public function syncParticipants(LegalCase $legalCase, array $data)
    {
        $this->LegalCaseParticipantRepository->where(['legal_case_id' => $legalCase->id])->delete();

        foreach ($data as $participant) {
            $this->LegalCaseParticipantRepository->create([
                'legal_case_id' => $legalCase->id,
                'customer_id' => $participant['customer_id'],
                'participant_type_id' => $participant['participant_type_id'],
            ]);
        }
    }
}
