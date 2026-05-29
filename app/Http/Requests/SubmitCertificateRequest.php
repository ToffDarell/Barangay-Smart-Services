<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitCertificateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'     => 'required|string|max:100',
            'middle_name'    => 'nullable|string|max:100',
            'last_name'      => 'required|string|max:100',
            'date_of_birth'  => 'required|date',
            'civil_status'   => 'required|string',
            'gender'         => 'required|string',
            'address'        => 'required|string',
            'purok'          => 'required|string',
            'contact_number' => 'required|string',
            'purpose'        => 'required|string',
            'valid_id'       => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'valid_id.max' => 'The valid ID must not exceed 5MB.',
        ];
    }
}
