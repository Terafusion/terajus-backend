<?php

namespace App\Http\Resources\DocumentRequest;

use App\Enums\DocumentRequestStatusEnum;
use App\Http\Resources\DocumentType\DocumentTypeResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentRequestDocResource extends JsonResource
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
            'document_request_id' => $this->document_request_id,
            'document_id' => $this->document_id,
            'document_type_id' => $this->document_type_id,
            'status' => $this->status,
            'document_type' => new DocumentTypeResource($this->documentType)
        ];
    }
}
