<?php

namespace KeyN\Make;

class Key16 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 16;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '0123456789abcdef';
    }
}
