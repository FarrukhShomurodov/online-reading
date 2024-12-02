<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'phone_number' => 'required|string',
            'sms_code' => 'required|array',
            'password' => ['required', 'string', Password::min(8)],
        ];
    }
}
