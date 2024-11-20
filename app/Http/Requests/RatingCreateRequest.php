<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class RatingCreateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'song_id' => 'required|integer|exists:songs,id', // ID оцениваемой песни
            'score' => 'required|integer|min:1|max:5', // Оценка в диапазоне от 1 до 5
            'review_text' => 'nullable|string|max:500', // Текст отзыва (необязательно)
        ];
    }

    public function messages()
    {
        return [
            'song_id.required' => 'Необходимо указать ID песни.',
            'song_id.integer' => 'ID песни должен быть числом.',
            'song_id.exists' => 'Указанная песня не найдена в базе данных.',
            'score.required' => 'Необходимо указать оценку.',
            'score.integer' => 'Оценка должна быть числом.',
            'score.min' => 'Минимальная оценка — 1.',
            'score.max' => 'Максимальная оценка — 5.',
            'review_text.string' => 'Текст отзыва должен быть строкой.',
            'review_text.max' => 'Текст отзыва не должен превышать 500 символов.',
        ];
    }
}
