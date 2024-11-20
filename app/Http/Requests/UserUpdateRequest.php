<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class UserUpdateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255', // Новое имя
            'email' => 'sometimes|string|email|max:255|unique:users,email', // Новый Email
            'password' => 'nullable|string|min:6|confirmed', // Новый пароль (опционально)
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'email.string' => 'Email должен быть строкой.',
            'email.email' => 'Email должен быть корректным.',
            'email.max' => 'Email не должен превышать 255 символов.',
            'email.unique' => 'Пользователь с таким Email уже существует.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ];
    }
}
