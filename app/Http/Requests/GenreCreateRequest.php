<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class GenreCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:genres,name', // Название жанра должно быть уникальным
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название жанра обязательно.',
            'name.string' => 'Название жанра должно быть строкой.',
            'name.max' => 'Название жанра не должно превышать 255 символов.',
            'name.unique' => 'Такой жанр уже существует.',
        ];
    }
}
