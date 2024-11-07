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
            'title' => 'required|string|max:300',
            'description' => 'required|string|max:600',
            'start_time' => 'required|date',
            'end_time' => 'required|date',

            'photos' => 'sometimes|array|max:10',
            'photos.*' => 'sometimes|image|mimes:jpg,png',
        ];
    }
}
