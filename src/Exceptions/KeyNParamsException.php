<?php

namespace KeyN\Exceptions;

class KeyNParamsException extends KeyNException
{
    /**
     * @param string $error
     *
     * @return KeyNParamsException
     */
    public static function make(string $error): self
    {
        $message = 'KeyN Params Error: ' . $error;

        return new static($message);
    }
}
