<?php

namespace App\Http\Resources\Document;

use App\Enums\DocumentStatusEnum;
use App\Http\Resources\DocumentType\DocumentTypeResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'document_type_id' => $this->document_type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->user),
            'document_type' => new DocumentTypeResource($this->documentType),
        ];
    }
}
