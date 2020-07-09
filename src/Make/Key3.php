<?php

namespace KeyN\Make;

class Key3 extends KeyNAbstract
{
    /**
     * @inheritDoc
     */
    public static function getBaseValue(): int
    {
        return 3;
    }

    /**
     * @inheritDoc
     */
    public static function getDictValue(): string
    {
        return '012';
    }
}
