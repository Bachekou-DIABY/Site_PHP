<?php
/**
 * Class InvalidDateTimeException.
 *
 * Exception lorsqu'une date est invalide
 */
class InvalidDateTimeException extends Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
