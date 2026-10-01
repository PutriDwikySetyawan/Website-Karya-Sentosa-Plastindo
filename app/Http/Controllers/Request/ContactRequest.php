<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:100',
            'company'  => 'nullable|string|max:150',
            'contact'  => 'required|string|max:150',
            'product'  => 'nullable|string|max:150',
            'size'     => 'nullable|string|max:100',
            'quantity' => 'nullable|string|max:100',
            'message'  => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Nama wajib diisi.',
            'contact.required' => 'Nomor WhatsApp / Email wajib diisi.',
            'max'              => 'Isian terlalu panjang.',
        ];
    }
}