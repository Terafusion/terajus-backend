<?php

namespace App\Services\LegalCase;

use App\Models\LegalCase\LegalCaseRequest;
use App\Models\User\User;
use App\Repositories\LegalCase\LegalCaseRequestRepository;
use App\Services\Escavador\EscavadorService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Ramsey\Uuid\Uuid;

class LegalCaseRequestService
{
    public function __construct(
        private EscavadorService $escavadorService,
        private LegalCaseRequestRepository $legalCaseRequestRepository,
    ) {
    }

    /**
     * Get an LegalCaseRequest instance by ID
     *
     * @param  LegalCaseRequest  $legalPleading
     * @return LegalCaseRequest
     */
    public function getById($legalPleading)
    {
        return $this->legalCaseRequestRepository->find($legalPleading->id);
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->legalCaseRequestRepository->getAll($user);
    }

    /**
     * Store a new LegalCaseRequest resource
     *
     * @return LegalCaseRequest
     */
    public function store(array $data, User $user)
    {
        $legalCaseRequest = $this->legalCaseRequestRepository->create(array_merge($data, ['uuid' => Uuid::uuid4()->toString(), 'user_id' => $user->id]));
        $legalCaseResume = $this->escavadorService->getLegalCaseByCnjNumber($legalCaseRequest->number);
        $legalCaseHistoric = $this->escavadorService->getHistoricByCnjNumber($legalCaseRequest->number);

        $legalCaseRequest->update(['resume' => $legalCaseResume, 'historic' => $legalCaseHistoric]);
        return $legalCaseRequest;
    }
}
