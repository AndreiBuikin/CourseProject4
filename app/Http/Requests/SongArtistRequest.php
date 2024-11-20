<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class SongArtistRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'song_id' => 'required|integer|exists:songs,id', // ID песни
            'artist_id' => 'required|integer|exists:artists,id', // ID исполнителя
        ];
    }

    public function messages()
    {
        return [
            'song_id.required' => 'Необходимо указать ID песни.',
            'song_id.integer' => 'ID песни должен быть числом.',
            'song_id.exists' => 'Указанная песня не найдена в базе данных.',
            'artist_id.required' => 'Необходимо указать ID исполнителя.',
            'artist_id.integer' => 'ID исполнителя должен быть числом.',
            'artist_id.exists' => 'Указанный исполнитель не найден.',
        ];
    }
}
