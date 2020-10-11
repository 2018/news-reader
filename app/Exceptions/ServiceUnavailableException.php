<?php

namespace App\Exceptions;

class ServiceUnavailableException extends CustomException
{
    protected $code = 503;
}