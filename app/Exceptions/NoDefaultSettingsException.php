<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NoDefaultSettingsException extends Exception
{
    protected $message = 'Default settings not found.';

    protected $code = Response::HTTP_NOT_FOUND;
}
