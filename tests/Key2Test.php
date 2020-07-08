<?php

namespace KeyN\Tests;

use KeyN\Make\Key2;
use PHPUnit\Framework\TestCase;

class Key2Test extends TestCase
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
        $result = Key2::make($dict)->encode($number);
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
        $result = Key2::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        return [
            [-2, '10'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '10'],
            [3, '11'],
            [4, '100'],
            [5, '101'],
            [6, '110'],
            [7, '111'],
            [8, '1000'],
            [9, '1001'],
            [10, '1010'],
            [100, '1100100'],
            [1293473, '100111011110010100001'],
            [1, 'b', 'ab'],
            [2, 'ba', 'ab'],
            [3, 'bb', 'ab'],
            [4, 'baa', 'ab'],
            [5, 'bab', 'ab'],
            [927345672, 'bbabbbabaaabbaaababbaaaaaabaaa', 'ab'],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        return [
            ['', null],
            ['1', 1],
            ['10', 2],
            ['11', 3],
            ['100', 4],
            ['101', 5],
            ['101111111101010', 24554],
            ['b', 1, 'ab'],
            ['ba', 2, 'ab'],
            ['bb', 3, 'ab'],
            ['baa', 4, 'ab'],
            ['bab', 5, 'ab'],
            ['baabbbabaaabbbbaaaababbaaaa', 82374832, 'ab'],
        ];
    }
}
