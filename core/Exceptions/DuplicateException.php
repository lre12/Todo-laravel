<?php


namespace Core\Exceptions;


use Exception;

class DuplicateException extends Exception
{
    public function __construct($message = '')
    {
        parent::__construct($message, 0, null);
    }
}
