<?php

namespace App\Services\DocumentRequest;

use App\Enums\DocumentRequestStatusEnum;
use App\Exceptions\DocumentRequestPendingDocsException;
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

    public function update(array $data, int $id): DocumentRequest
    {
        DB::beginTransaction();
        try {
            $documentRequest = $this->documentRequestRepository->update($data, $id);

            if (isset($data['status']) && $data['status'] === DocumentRequestStatusEnum::COMPLETED) {
                $this->documentRequestDocService->updateAllByDocumentRequest($id, ['status' => DocumentRequestStatusEnum::COMPLETED]);
            }

            if (!isset($data['status']) && isset($data['document_request_docs'])) {
                foreach ($data['document_request_docs'] as $key => $documentRequestDoc) {
                    $this->documentRequestDocService->update($documentRequestDoc, $documentRequestDoc['id']);
                }
            }

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
