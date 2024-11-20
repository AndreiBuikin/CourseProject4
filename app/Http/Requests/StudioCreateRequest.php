<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class StudioCreateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:studios,name', // Название студии
            'location' => 'nullable|string|max:500', // Локация студии (опционально)
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название студии обязательно.',
            'name.string' => 'Название студии должно быть строкой.',
            'name.max' => 'Название студии не должно превышать 255 символов.',
            'name.unique' => 'Студия с таким названием уже существует.',
            'location.string' => 'Локация должна быть строкой.',
            'location.max' => 'Локация не должна превышать 500 символов.',
        ];
    }
}
