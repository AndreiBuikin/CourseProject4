<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class SongGenreRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'song_id' => 'required|integer|exists:songs,id', // ID песни
            'genre_id' => 'required|integer|exists:genres,id', // ID жанра
        ];
    }

    public function messages()
    {
        return [
            'song_id.required' => 'Необходимо указать ID песни.',
            'song_id.integer' => 'ID песни должен быть числом.',
            'song_id.exists' => 'Указанная песня не найдена в базе данных.',
            'genre_id.required' => 'Необходимо указать ID жанра.',
            'genre_id.integer' => 'ID жанра должен быть числом.',
            'genre_id.exists' => 'Указанный жанр не найден.',
        ];
    }
}
