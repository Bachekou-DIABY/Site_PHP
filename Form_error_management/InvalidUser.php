<?php
/**
 * Class InvalidUserException.
 *
 * Exception métier lorsqu'un objet User est invalide
 */
class InvalidUserException extends Exception
{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
