<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class AgeRatingRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'age' => 'required|integer|min:0|max:18', // Возраст должен быть в диапазоне 0–18
            'description' => 'nullable|string|max:255', // Описание возрастного ограничения (необязательно)
        ];
    }

    public function messages()
    {
        return [
            'age.required' => 'Поле возраст обязательно для заполнения.',
            'age.integer' => 'Возраст должен быть числом.',
            'age.min' => 'Возраст не может быть меньше 0.',
            'age.max' => 'Возраст не может быть больше 18.',
            'description.string' => 'Описание должно быть текстом.',
            'description.max' => 'Описание не должно превышать 255 символов.',
        ];
    }
}
