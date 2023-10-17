<?php

namespace App\Services\Evidence;

use App\Enums\EvidenceStatusEnum;
use App\Models\Evidence\Evidence;
use App\Models\User\User;
use App\Repositories\Evidence\EvidenceRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class EvidenceService
{
    public function __construct(private EvidenceRepository $evidenceRepository)
    {
    }

    /**
     * Get an evidence instance by ID
     * 
     * @param int $id
     * @return Evidence
     */
    public function getById($id)
    {
        return $this->evidenceRepository->find($id);
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->evidenceRepository->getAll();
    }

    /**
     * Store a new Evidence resource
     * 
     * @param array $data
     * @return Evidence
     */
    public function store(array $data)
    {
        return $this->evidenceRepository->create($data);
    }

    /**
     * Delete an evidence register
     * 
     * @param int $id
     * @return mixed
     */
    public function delete($id)
    {
        $evidence = $this->getById($id);
        return $this->evidenceRepository->delete($evidence->id);
    }
}
