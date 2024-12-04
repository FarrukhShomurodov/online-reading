<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'book_id' => 'required|integer|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'text' => 'required|string|max:600',
            'ratting' => 'required|numeric|min:0|max:5',
        ];
    }
}
