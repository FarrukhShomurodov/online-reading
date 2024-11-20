<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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

            'text' => 'required|array',
            'text.ru' => 'required|string|max:500',
            'text.uz' => 'required|string|max:500',

            'news_category_id' => 'required|integer|exists:news_categories,id',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
