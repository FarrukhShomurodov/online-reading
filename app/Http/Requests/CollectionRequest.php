<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('books') && $this->input('books')[0] === null) {
            $this->merge([
                'books' => [],
            ]);
        }
    }

    /**
     * @return array<string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.ru' => 'required|string|max:300',
            'name.uz' => 'required|string|max:300',

            'description' => 'required|array',
            'description.ru' => 'required|string|max:500',
            'description.uz' => 'required|string|max:500',

            'books' => 'sometimes|array',
            'books.*' => 'sometimes|integer|exists:books,id',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
