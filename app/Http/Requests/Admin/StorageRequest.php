<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StorageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<string, Password>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:admins,email',
            'password' => ['required', 'string', Password::min(8)],
        ];
    }
}
