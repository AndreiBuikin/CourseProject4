<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function __construct(string $message, int $code = 500, $errors = []){
        $exception = ['message' => $message,
            'code' => $code,
    ];        if (!empty($errors)) {
        $exception['errors'] = $errors;        }
        parent::__construct(response()->json($exception)->setStatusCode($code) );    }
}
