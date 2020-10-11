<?php

namespace App\Exceptions;

class NotValidException extends CustomException
{
    protected $code = 409;
}