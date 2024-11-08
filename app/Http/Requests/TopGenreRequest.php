<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopGenreRequest extends FormRequest
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
            'genres' => 'required|array',
            'genres.*' => 'required|integer|exists:genres,id',
        ];
    }
}
