<?php

namespace KeyN\Tests;

use KeyN\Make\Key3;
use PHPUnit\Framework\TestCase;

class Key3Test extends TestCase
{
    /**
     * @dataProvider dataSuccessEncodeList
     *
     * @param int         $number
     * @param string|null $key
     * @param string|null $dict
     *
     * @throws \KeyN\Exceptions\KeyNException
     */
    public function testSuccessEncode(int $number, ?string $key, ?string $dict = null)
    {
        $result = Key3::make($dict)->encode($number);
        $this->assertEquals($key, $result);
    }

    /**
     * @dataProvider dataSuccessDecodeList
     *
     * @param string      $key
     * @param int|null    $number
     * @param string|null $dict
     *
     * @throws \KeyN\Exceptions\KeyNException
     */
    public function testSuccessDecode(string $key, ?int $number, ?string $dict = null)
    {
        $result = Key3::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        $dict = 'abc';

        return [
            [-1524, '2002110'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '2'],
            [3, '10'],
            [4, '11'],
            [5, '12'],
            [6, '20'],
            [7, '21'],
            [8, '22'],
            [9, '100'],
            [10, '101'],
            [45645, '2022121120'],
            [1, 'b', $dict],
            [2, 'c', $dict],
            [3, 'ba', $dict],
            [4, 'bb', $dict],
            [5, 'bc', $dict],
            [456456, 'cbcabcabacba', $dict],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        $dict = 'abc';

        return [
            ['', null],
            ['1', 1],
            ['2', 2],
            ['1201220', 1266],
            ['abbbcaa', 369, $dict],
            ['abbbcaa1', null, $dict],
        ];
    }
}
