<?php

namespace KeyN\Make;

class Key2 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 2;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '01';
    }
}
