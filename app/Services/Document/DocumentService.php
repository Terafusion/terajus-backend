<?php

namespace App\Services\Document;

use App\Models\Document\Document;
use App\Models\User\User;
use App\Repositories\Document\DocumentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentService
{
    public function __construct(
        private DocumentRepository $documentRepository,
    ) {
    }

    /**
     * Create a new Document Request register
     *
     *
     * @return Document
     */
    public function store(array $data, User $user)
    {
        DB::beginTransaction();
        try {
            $uploadedDocument = $this->upload($data['file'], $user);
            $document = $this->documentRepository->create(
                array_merge(
                    $data,
                    [
                        'user_id' => $user->id,
                        'file_path' => $uploadedDocument['file_path'],
                        'file_name' => $uploadedDocument['file_name'],
                    ]
                )
            );
            DB::commit();

            return $document;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->documentRepository->getAll($user);
    }

    public function upload($file, $model)
    {
        $fileName = Str::uuid().'.'.$file->getClientOriginalExtension();
        $filePath = 'documents/'.$model->getTable().'/'.$model->id.'/'.$fileName;

        Storage::disk('s3')->put($filePath, file_get_contents($file));

        return [
            'file_name' => $fileName,
            'file_path' => $filePath,
        ];
    }

    public function download(Document $document): mixed
    {
        $headers = [
            'Content-Type' => Storage::disk('s3')->mimeType($document->file_path),
            'Content-Disposition' => 'attachment; filename="'.$document->file_name.'"',
        ];

        return Storage::disk('s3')->response($document->file_path, null, $headers);
    }
}
