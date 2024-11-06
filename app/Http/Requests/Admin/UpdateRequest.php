<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
            'email' => 'required|string|email',
            'password' => ['nullable', 'string', Password::min(8)],
        ];
    }
}
