<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:300',
            'author' => 'required|string|max:300',
            'description' => 'required|string|max:500',
            'is_active' => 'required|boolean',
            'publication_date' => 'required|date',

            'image' => 'sometimes|array',
            'image*' => 'sometimes|string|mime:jpg,png',

            'categories' => 'required|array',
            'categories.*' => 'required|integer|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'required|integer|exists:tags,id',
            'genres' => 'required|array',
            'genres.*' => 'required|integer|exists:genres,id',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
