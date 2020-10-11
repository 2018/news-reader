<?php

namespace App\Exceptions;

class AuthException extends CustomException
{
    protected $code = 401;
}