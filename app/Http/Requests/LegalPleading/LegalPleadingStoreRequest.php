<?php

namespace App\Http\Requests\LegalPleading;

use Illuminate\Foundation\Http\FormRequest;

class LegalPleadingStoreRequest extends FormRequest
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
            'fields_of_law' => ['required', 'string'],
            'legal_case_id' => ['nullable', 'numeric', 'exists,legal_cases,id'],
            'legal_pleading_type_id' => ['nullable', 'numeric', 'exists,legal_pleading_types,id'],
            'status' => ['nullable', 'string'],
            'context' => ['nullable'],
        ];
    }
}
