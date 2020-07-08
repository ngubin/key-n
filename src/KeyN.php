<?php

namespace KeyN;

use KeyN\Exceptions\KeyNParamsException;

class KeyN
{
    const PARAMS_ERROR_BASE_MIN_VALUE = 'The base must be an integer greater than 1';
    const PARAMS_ERROR_BASE_EQUAL_DICT = 'The base must equal the number of characters in the dictionary';

    /**
     * @var int
     */
    protected $base;

    /**
     * @var string[]
     */
    protected $dict;

    /**
     * @var int[]
     */
    protected $balance;

    /**
     * @param int    $base
     * @param string $dict
     *
     * @throws KeyNParamsException
     */
    public function __construct(int $base, string $dict)
    {
        $this->base = $base;
        $this->dict = $this->dict($dict);
        $this->balance = $this->balance($this->dict);
        $this->validateKeyParams($this->base, $this->dict);
    }

    /**
     * @param string $value
     *
     * @return array
     */
    protected function dict(string $value): array
    {
        return array_unique(str_split($value));
    }

    /**
     * @param array $dict
     *
     * @return array
     */
    protected function balance(array $dict): array
    {
        return array_flip($dict);
    }

    /**
     * @param int $number
     *
     * @return string|null
     */
    final public function encode(int $number): ?string
    {
        $result = '';
        $number = $this->clearNumberValue($number);

        if ($number === 0) {
            return null;
        }

        while ($number > 0) {
            $result = $this->dict[$number % $this->base] . $result;
            $number = floor($number / $this->base);
        }

        return $result;
    }

    /**
     * @param string $key
     *
     * @return int|null
     */
    final public function decode(string $key): ?int
    {
        $number = 0;
        $key = $this->clearKeyValue($key);
        $keyLength = strlen($key);

        for ($i = 0; $i < $keyLength; $i++) {
            if (isset($this->balance[$key[$i]])) {
                $number = $this->base * $number + $this->balance[$key[$i]];
            } else {
                return null;
            }
        }

        return $number;
    }

    /**
     * @param int $number
     *
     * @return int
     */
    protected function clearNumberValue(int $number): int
    {
        return abs($number);
    }

    /**
     * @param string $key
     *
     * @return string
     */
    protected function clearKeyValue(string $key): string
    {
        return trim($key);
    }

    /**
     * @param int   $base
     * @param array $dict
     *
     * @throws KeyNParamsException
     */
    protected function validateKeyParams(int $base, array $dict)
    {
        if ($base <= 1) {
            throw KeyNParamsException::make(static::PARAMS_ERROR_BASE_MIN_VALUE);
        } else if ($base !== count($dict)) {
            throw KeyNParamsException::make(static::PARAMS_ERROR_BASE_EQUAL_DICT);
        }
    }
}
