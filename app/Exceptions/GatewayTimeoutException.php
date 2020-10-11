<?php

namespace App\Exceptions;

class GatewayTimeoutException extends CustomException
{
    protected $code = 504;
}