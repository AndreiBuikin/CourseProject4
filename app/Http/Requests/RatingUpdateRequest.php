<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class RatingUpdateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'score' => 'sometimes|integer|min:1|max:5', // Изменяемая оценка
            'review_text' => 'nullable|string|max:500', // Обновляемый текст отзыва
        ];
    }

    public function messages()
    {
        return [
            'score.integer' => 'Оценка должна быть числом.',
            'score.min' => 'Минимальная оценка — 1.',
            'score.max' => 'Максимальная оценка — 5.',
            'review_text.string' => 'Текст отзыва должен быть строкой.',
            'review_text.max' => 'Текст отзыва не должен превышать 500 символов.',
        ];
    }
}
