<?php
/**
 * Class InvalidContentTypeException.
 *
 * Exception lorsqu'un type de contenu n'est pas valide
 */
class InvalidContentTypeException extends Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
