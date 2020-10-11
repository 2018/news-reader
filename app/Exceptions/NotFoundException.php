<?php

namespace App\Exceptions;

class NotFoundException extends CustomException
{
    protected $code = 404;
}