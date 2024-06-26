<?php

namespace App\Http\Resources\LegalCase;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalCaseResource extends JsonResource
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
            'case_type' => $this->case_type,
            'case_matter' => $this->case_matter,
            'status' => $this->status,
            'pending_protocol' => $this->pending_protocol,
            'case_description' => $this->case_description,
            'case_requests' => $this->case_requests,
            'complaint' => $this->complaint,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'participants' => LegalCaseParticipantResource::collection($this->participants),
        ];
    }
}
