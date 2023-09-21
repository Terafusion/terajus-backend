<?php

namespace App\Http\Requests\LegalCase;

use Illuminate\Foundation\Http\FormRequest;

class LegalCaseUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'case_description' => ['nullable'],
            'case_requests' => ['nullable'],
            'status' => ['nullable'],
            'complaint' => ['nullable'],
            'court' => ['nullable'],
            'fields_of_law' => ['nullable'],
            'participants' => ['array', 'nullable'],
            // 'participants.user_id' => ['nullable', 'exists:users,id'], 
            // 'participants.participant_type_id' => ['nullable', 'exists:users,id'], 
        ];
    }
}
