<?php

namespace App\Http\Resources\DocumentRequest;

use App\Enums\DocumentRequestStatusEnum;
use App\Http\Resources\DocumentType\DocumentTypeResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->hasPendingDocumentRequestDocs() ? DocumentRequestStatusEnum::PENDING : DocumentRequestStatusEnum::FINISHED,
            'user_id' => $this->user_id,
            'client_id' => $this->client_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'client' => new UserResource($this->whenLoaded('client')),
            'requested_documents' => DocumentRequestDocResource::collection($this->whenLoaded('requestedDocuments')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
