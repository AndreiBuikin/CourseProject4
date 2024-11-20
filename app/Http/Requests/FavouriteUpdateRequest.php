<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class FavouriteUpdateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'song_id' => 'required|integer|exists:songs,id', // ID песни, которая обновляется в избранном
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
