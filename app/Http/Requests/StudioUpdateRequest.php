<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class StudioUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255|unique:studios,name', // Новое название студии
            'location' => 'nullable|string|max:500', // Новая локация
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Название студии должно быть строкой.',
            'name.max' => 'Название студии не должно превышать 255 символов.',
            'name.unique' => 'Студия с таким названием уже существует.',
            'location.string' => 'Локация должна быть строкой.',
            'location.max' => 'Локация не должна превышать 500 символов.',
        ];
    }
}
