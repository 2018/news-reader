<?php

namespace App\Exceptions;

class NotModifiedException extends CustomException
{
    protected $code = 304;
}