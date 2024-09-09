<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ConnectionLimitException extends Exception
{
    protected $message = 'Connection limit exceeded';

    protected $code = Response::HTTP_UNAUTHORIZED;
}
