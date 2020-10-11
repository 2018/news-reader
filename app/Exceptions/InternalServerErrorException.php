<?php

namespace App\Exceptions;

class InternalServerErrorException extends CustomException
{
    protected $code = 500;
}