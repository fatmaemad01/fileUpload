<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:25' ,
             'message' => 'nullable|string|max:255|min:5',
             'file' => 'required|mimes:pdf,doc,docx,jpg,zip,txt,png|max:10240'
        ];
    }

    public function messages() : array
    {
        return [
            'file.required' => 'Upload file to share!',
            'name.required' => 'File title important!', 
        ];
    }
}
