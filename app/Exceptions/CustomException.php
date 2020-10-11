<?php

namespace App\Exceptions;
use Exception;

abstract class CustomException extends Exception
{
    /**
     * CustomException constructor.
     *
     * @param string $message error message
     */
    public function __construct($message)
    {
        $message = $this->create(func_get_args());
        parent::__construct($message, $this->code);
    }

    /**
     * Creates exception message
     *
     * @param array $args replacement vars in message ['param' => 'value']
     *
     * @return mixed|string
     */
    public function create(array $args)
    {
        $id = array_shift($args);
        $aArgs = count($args) > 0 ? array_shift($args) : $args;
        return trans("exceptions.".$id, $aArgs);
    }
}