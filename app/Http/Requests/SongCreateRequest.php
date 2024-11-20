<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class SongCreateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255', // Название песни
            'artist_id' => 'required|integer|exists:artists,id', // ID исполнителя
            'genre_id' => 'nullable|integer|exists:genres,id', // ID жанра (необязательно)
            'release_date' => 'nullable|date', // Дата выпуска песни
            'duration' => 'nullable|integer|min:1', // Продолжительность песни (в секундах)
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название песни обязательно.',
            'title.string' => 'Название песни должно быть строкой.',
            'title.max' => 'Название песни не должно превышать 255 символов.',
            'artist_id.required' => 'Необходимо указать исполнителя.',
            'artist_id.integer' => 'ID исполнителя должен быть числом.',
            'artist_id.exists' => 'Указанный исполнитель не найден в базе данных.',
            'genre_id.integer' => 'ID жанра должен быть числом.',
            'genre_id.exists' => 'Указанный жанр не найден.',
            'release_date.date' => 'Дата выпуска должна быть корректной датой.',
            'duration.integer' => 'Продолжительность должна быть числом.',
            'duration.min' => 'Продолжительность песни должна быть больше 0.',
        ];
    }
}
