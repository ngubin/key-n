<?php

namespace KeyN\Make;

use KeyN\KeyN;

abstract class KeyNAbstract implements KeyNInterface
{
    /**
     * @param string|null $dict
     *
     * @return KeyN
     * @throws \KeyN\Exceptions\KeyNException
     */
    public static function make(?string $dict = null): KeyN
    {
        if (($dict = trim($dict)) === '') {
            $dict = static::getDictValue();
        }

        return new KeyN(
            static::getBaseValue(),
            $dict
        );
    }
}
