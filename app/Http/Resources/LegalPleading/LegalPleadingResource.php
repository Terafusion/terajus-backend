<?php

namespace App\Http\Resources\LegalPleading;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalPleadingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'tenant_id' => $this->tenant_id,
            'uuid' => $this->uuid,
            'slug' => $this->slug,
            'legal_pleading' => [
                'court' => $this->court,
                'fields_of_law' => $this->fields_of_law,
                'content' => $this->content,
                'lawyers' => $this->lawyers,
                'plaintiffs' => $this->plaintiffs,
                'defendants' => $this->defendants,
            ],
            'meta_data' => [
                'legal_pleading_word_count' => $this->legal_pleading_word_count,
                'prompt_word_count' => $this->prompt_word_count,
                'prompt_text' => $this->prompt_text,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}