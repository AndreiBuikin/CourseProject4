<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ArtistCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255', // Имя исполнителя
            'lastname' => 'required|string|max:255', // Фамилия исполнителя
            'birthdate' => 'required|date', // Фамилия исполнителя
            'genre' => 'nullable|string|max:255', // Жанр (необязательно)
            'biography' => 'nullable|string', // Биография (необязательно)
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'Имя исполнителя обязательно.',
            'firstname.string' => 'Имя исполнителя должно быть строкой.',
            'firstname.max' => 'Имя исполнителя не должно превышать 255 символов.',
            'genre.string' => 'Жанр должен быть строкой.',
            'genre.max' => 'Жанр не должен превышать 255 символов.',
            'biography.string' => 'Биография должна быть текстом.',
        ];
    }
}
