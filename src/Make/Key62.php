<?php

namespace KeyN\Make;

class Key62 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 62;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
}
