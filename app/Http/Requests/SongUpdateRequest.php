<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class SongUpdateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255', // Новое название песни
            'artist_id' => 'sometimes|integer|exists:artists,id', // ID нового исполнителя
            'genre_id' => 'nullable|integer|exists:genres,id', // ID нового жанра
            'release_date' => 'nullable|date', // Новая дата выпуска
            'duration' => 'nullable|integer|min:1', // Новая продолжительность песни
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Название песни должно быть строкой.',
            'title.max' => 'Название песни не должно превышать 255 символов.',
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
