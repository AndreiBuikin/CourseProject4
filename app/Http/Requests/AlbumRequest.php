<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AlbumRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255', // Название альбома (обязательно)
            'release_date' => 'required|date', // Дата релиза (обязательно)
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
            'release_date.required' => 'Дата релиза обязательна.',
            'release_date.date' => 'Дата релиза должна быть в формате даты.',
            'songs.array' => 'Песни должны быть переданы в виде массива.',
            'songs.*.integer' => 'Идентификатор песни должен быть числом.',
            'songs.*.exists' => 'Некоторые из указанных песен отсутствуют в базе данных.',
        ];
    }
}
