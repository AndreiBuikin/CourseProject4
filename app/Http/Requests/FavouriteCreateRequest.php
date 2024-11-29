<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class FavouriteCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'date_of_addition' => 'required|date',
            'song_id' => 'required|integer|exists:songs,id', // ID песни, добавляемой в избранное
            'album_id' => 'required|integer|exists:albums,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'song_id.required' => 'Необходимо указать ID песни.',
            'song_id.integer' => 'ID песни должен быть числом.',
            'song_id.exists' => 'Указанная песня не найдена в базе данных.',
        ];
    }
}
