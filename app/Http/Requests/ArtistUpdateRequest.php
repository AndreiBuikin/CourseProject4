<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ArtistUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255', // Имя исполнителя (может быть обновлено)
            'genre' => 'nullable|string|max:255', // Жанр (опционально)
            'bio' => 'nullable|string', // Биография (опционально)
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Имя исполнителя должно быть строкой.',
            'name.max' => 'Имя исполнителя не должно превышать 255 символов.',
            'genre.string' => 'Жанр должен быть строкой.',
            'genre.max' => 'Жанр не должен превышать 255 символов.',
            'bio.string' => 'Биография должна быть текстом.',
        ];
    }
}
