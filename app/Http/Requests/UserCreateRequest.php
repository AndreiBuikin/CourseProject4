<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class UserCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules()
    {
        return [
            'username' => 'required|string|max:255', // Имя пользователя
            'email' => 'required|string|email|max:255|unique:users,email', // Email пользователя
            'password' => 'required|string|min:6', // Пароль пользователя
            'gender' => 'required|integer|in:1,2', // Пол пользователя (обязательно, допустимы только значения 1 или 2)
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Имя пользователя обязательно.',
            'username.string' => 'Имя должно быть строкой.',
            'username.max' => 'Имя не должно превышать 255 символов.',
            'email.required' => 'Email обязателен.',
            'email.string' => 'Email должен быть строкой.',
            'email.email' => 'Email должен быть корректным.',
            'email.max' => 'Email не должен превышать 255 символов.',
            'email.unique' => 'Пользователь с таким Email уже существует.',
            'password.required' => 'Пароль обязателен.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 6 символов.',
        ];
    }
}
