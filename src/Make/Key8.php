<?php

namespace KeyN\Make;

class Key8 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 8;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '01234567';
    }
}
