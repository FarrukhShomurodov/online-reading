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
            'title' => 'required|array',
            'title.ru' => 'required|string|max:300',
            'title.uz' => 'required|string|max:300',

            'author_id' => 'required|integer|exists:authors,id',

            'description' => 'required|array',
            'description.ru' => 'required|string|max:500',
            'description.uz' => 'required|string|max:500',

            'is_active' => 'required|boolean',
            'publication_date' => 'required|date',

            'categories' => 'required|array',
            'categories.*' => 'required|integer|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'required|integer|exists:tags,id',
            'genres' => 'required|array',
            'genres.*' => 'required|integer|exists:genres,id',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',

            'files' => 'sometimes|array|max:2',
            'files.ru' => 'sometimes|mimes:pdf',
            'files.uz' => 'sometimes|mimes:pdf',
        ];
    }
}
