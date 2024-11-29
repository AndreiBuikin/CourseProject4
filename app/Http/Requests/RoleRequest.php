<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class RoleRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:roles,name', // Название роли
            'permissions' => 'required|array', // Список разрешений для роли
            'permissions.*' => 'integer|exists:permissions,id', // Каждое разрешение должно существовать в базе
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название роли обязательно.',
            'name.string' => 'Название роли должно быть строкой.',
            'name.max' => 'Название роли не должно превышать 255 символов.',
            'name.unique' => 'Роль с таким названием уже существует.',
            'permissions.required' => 'Необходимо указать список разрешений.',
            'permissions.array' => 'Список разрешений должен быть массивом.',
            'permissions.*.integer' => 'Каждое разрешение должно быть числовым идентификатором.',
            'permissions.*.exists' => 'Некоторые разрешения указаны неверно или отсутствуют в базе.',
        ];
    }
}
