<?php

namespace KeyN\Make;

interface KeyNInterface
{
    /**
     * @return int
     */
    public static function getBaseValue(): int;

    /**
     * @return string
     */
    public static function getDictValue(): string;
}
