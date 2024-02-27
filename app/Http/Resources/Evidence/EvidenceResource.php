<?php

namespace App\Http\Resources\Evidence;

use App\Http\Resources\Document\DocumentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EvidenceResource extends JsonResource
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
            'legal_case_id' => $this->legal_case_id,
            'legal_case_reference' => $this->legal_case_reference,
            'description' => $this->description,
            'documents' => DocumentResource::collection($this->documents)
        ];
    }
}
