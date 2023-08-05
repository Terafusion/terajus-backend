<?php

namespace App\Http\Requests\LegalCase;

use Illuminate\Foundation\Http\FormRequest;

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
            'plaintiff_id' => ['required', 'exists:users,id'],
            'defendant_id' => ['required', 'exists:users,id'],
            'case_type' => ['required'],
            'case_matter' => ['required'],
            'case_description' => ['required'],
            'case_requests' => ['nullable']
        ];
    }
}
