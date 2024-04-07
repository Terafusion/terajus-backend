<?php

namespace App\Http\Resources\LegalPleading;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalPleadingResource extends JsonResource
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
            'status' => $this->status,
            'fields_of_law' => $this->fields_of_law,
            'legal_pleading_type_id' => $this->legal_pleading_type_id,
            'context' => $this->context,
            'content' => $this->content,
        ];
    }
}
