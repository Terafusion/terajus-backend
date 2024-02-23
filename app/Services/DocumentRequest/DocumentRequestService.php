<?php

namespace App\Services\DocumentRequest;

use App\Models\DocumentRequest\DocumentRequest;
use App\Models\User\User;
use App\Repositories\DocumentRequest\DocumentRequestRepository;
use App\Services\DocumentRequestDoc\DocumentRequestDocService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DocumentRequestService
{
    public function __construct(
        private DocumentRequestRepository $documentRequestRepository,
        private DocumentRequestDocService $documentRequestDocService
    ) {
    }

    /**
     * Create a new Document Request register
     * 
     * @param array $data
     * @param User $user
     * 
     * @return DocumentRequest
     */
    public function store(array $data, User $user)
    {
        DB::beginTransaction();
        try {
            $documentRequest = $this->documentRequestRepository->create(array_merge($data, ['user_id' => $user->id]));
            $this->documentRequestDocService->store($data, $documentRequest->id);

            DB::commit();
            return $documentRequest;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Get all registers
     * 
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->documentRequestRepository->getAll();
    }
}
