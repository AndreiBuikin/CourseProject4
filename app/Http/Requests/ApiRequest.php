<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ApiRequest extends FormRequest
{
    public function failedAuthorization()
    {
        throw new ApiException('Forbidden', 403);
    }
    // Вызов исключения при провале валидации данных
    protected function failedValidation(Validator $validator)
    {
        throw new ApiException('Unprocessable Content', 422, $validator->errors());
    }
}
