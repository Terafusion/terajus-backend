<?php

namespace App\Services\ParticipantType;

use App\Repositories\ParticipantType\ParticipantTypeRepository;
use Illuminate\Database\Eloquent\Collection;

class ParticipantTypeService
{
    public function __construct(private ParticipantTypeRepository $participantTypeRepository)
    {
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->participantTypeRepository->getAll();
    }
}
