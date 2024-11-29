<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AlbumRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required|string|max:255', // Название альбома (обязательно)
            'release_year' => 'required|int', // Дата релиза (обязательно)
            'studio_id' => 'required|int',
            'songs' => 'nullable|array', // Массив песен (необязательно)
            'songs.*' => 'integer|exists:songs,id', // Каждая песня должна существовать в таблице песен
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название альбома обязательно.',
            'title.string' => 'Название альбома должно быть строкой.',
            'title.max' => 'Название альбома не должно превышать 255 символов.',
            'release_year.required' => 'Дата релиза обязательна.',
            'songs.array' => 'Песни должны быть переданы в виде массива.',
            'songs.*.integer' => 'Идентификатор песни должен быть числом.',
            'songs.*.exists' => 'Некоторые из указанных песен отсутствуют в базе данных.',
        ];
    }
}
