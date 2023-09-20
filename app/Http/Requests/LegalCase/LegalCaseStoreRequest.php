<?php

namespace App\Http\Requests\LegalCase;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LegalCaseStoreRequest extends FormRequest
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
            'case_type' => ['required'],
            'case_matter' => ['required'],
            'case_description' => ['nullable'],
            'case_requests' => ['nullable'],
            'status' => ['nullable'],
            'court' => ['nullable'],
            'fields_of_law' => ['nullable'],
            'complaint' => ['nullable'],
            'participants' => ['array', 'nullable'],
            //'participants.user_id' => [Rule::requiredIf($this->participants !== null)], 
            //'participants.participant_type_id' => [Rule::requiredIf($this->participants !== null), 'exists:users,id'], 
        ];
    }
}
