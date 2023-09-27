<?php

namespace App\Http\Requests\Evidence;

use Illuminate\Foundation\Http\FormRequest;

class EvidenceStoreRequest extends FormRequest
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
            'description' => ['required'],
            'legal_case_id' => ['required', 'exists:legal_cases,id'],
            'legal_case_reference' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'legal_case_reference' => uniqid()
        ]);
    }
}
