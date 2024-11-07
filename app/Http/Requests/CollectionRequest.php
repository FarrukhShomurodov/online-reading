<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'name' => 'required|string|max:300',
            'description' => 'required|string|max:500',

            'books' => 'required|array',
            'books.*' => 'required|integer|exists:books,id',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
