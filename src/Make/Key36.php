<?php

namespace KeyN\Make;

class Key36 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 36;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '0123456789abcdefghijklmnopqrstuvwxyz';
    }
}
