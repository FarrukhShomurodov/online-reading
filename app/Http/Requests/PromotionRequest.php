<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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

            'description' => 'required|array',
            'description.ru' => 'required|string|max:500',
            'description.uz' => 'required|string|max:500',

            'start_time' => 'required|date',
            'end_time' => 'required|date',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
