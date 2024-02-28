<?php

namespace App\Http\Requests\Document;

use App\Rules\ValidModelType;
use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'file' => 'required|mimes:pdf,doc,docx,csv,jpg,jpeg,png',
            'model_type' => ['required', 'string',  new ValidModelType],
            'model_id' => ['required', 'numeric'],
            'document_type_id' => ['nullable', 'numeric', 'exists:document_types,id'],
            'description' => ['nullable', 'string']
        ];
    }
}
