<?php

namespace App\Http\Requests\DocumentRequest;

use App\Enums\DocumentRequestStatusEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequestUpdateRequest extends FormRequest
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
    // ...

    public function rules()
    {
        return [
            'status' => ['nullable', new EnumValue(DocumentRequestStatusEnum::class)],
            'document_request_docs' => ['nullable', 'array'],
            'document_request_docs.*.id' => ['nullable', 'exists:document_request_docs,id'],
            'document_request_docs.*.status' => ['required_with:document_request_docs.*.id', new EnumValue(DocumentRequestStatusEnum::class)],
        ];
    }
}
