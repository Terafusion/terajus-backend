<?php

namespace App\Http\Resources\LegalCase;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LegalCaseParticipantResource extends JsonResource
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
            'user_id' => $this->user_id,
            'participant_type_id' => $this->participant_type_id,
            'participant_type' => $this->participantType,
            'user' => new UserResource($this->user)
        ];
    }
}
