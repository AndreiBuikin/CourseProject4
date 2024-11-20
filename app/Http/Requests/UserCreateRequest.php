<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class UserCreateRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255', // Имя пользователя
            'email' => 'required|string|email|max:255|unique:users,email', // Email пользователя
            'password' => 'required|string|min:6|confirmed', // Пароль пользователя
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя обязательно.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'email.required' => 'Email обязателен.',
            'email.string' => 'Email должен быть строкой.',
            'email.email' => 'Email должен быть корректным.',
            'email.max' => 'Email не должен превышать 255 символов.',
            'email.unique' => 'Пользователь с таким Email уже существует.',
            'password.required' => 'Пароль обязателен.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
        ];
    }
}
