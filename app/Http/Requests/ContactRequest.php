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
        'name'     => ['required', 'string', 'max:100'],
        'company'  => ['nullable', 'string', 'max:100'],
        'contact'  => ['required', 'string', 'max:100'],
        'product'  => ['nullable', 'string', 'max:100'],
        'size'     => ['nullable', 'string', 'max:100'],
        'quantity' => ['nullable', 'string', 'max:100'],
        'message'  => ['nullable', 'string', 'max:2000'],
    ];
}
}