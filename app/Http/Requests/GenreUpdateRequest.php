<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class GenreUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255|unique:genres,name', // Уникальность имени жанра
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Название жанра должно быть строкой.',
            'name.max' => 'Название жанра не должно превышать 255 символов.',
            'name.unique' => 'Такой жанр уже существует.',
        ];
    }
}
