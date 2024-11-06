<?php

namespace App\Http\Requests;

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
            'book_id' => 'required|integer|exists:id,books',
            'user_id' => 'required|integer|exists:id,users',
            'name' => 'required|string|max:300',
            'last_name' => 'required|string|max:300',
            'text' => 'required|string|max:600',
            'ratting' => 'required|numeric|min:0|max:5',
            'is_view' => 'required|boolean',
        ];
    }
}
