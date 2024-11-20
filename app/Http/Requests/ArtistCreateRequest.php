<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ArtistCreateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255', // Имя исполнителя
            'genre' => 'nullable|string|max:255', // Жанр (необязательно)
            'bio' => 'nullable|string', // Биография (необязательно)
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя исполнителя обязательно.',
            'name.string' => 'Имя исполнителя должно быть строкой.',
            'name.max' => 'Имя исполнителя не должно превышать 255 символов.',
            'genre.string' => 'Жанр должен быть строкой.',
            'genre.max' => 'Жанр не должен превышать 255 символов.',
            'bio.string' => 'Биография должна быть текстом.',
        ];
    }
}
