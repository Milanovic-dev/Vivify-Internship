<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render($request) {
        return ['foo' => 'bar'];
    }
}
