<?php

namespace KeyN\Tests;

use KeyN\Make\Key16;
use PHPUnit\Framework\TestCase;

class Key16Test extends TestCase
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
        $result = Key16::make($dict)->encode($number);
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
        $result = Key16::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        $dict = 'poiuytrewqkjhgfd';
        
        return [
            [-2, '2'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '2'],
            [3423, 'd5f'],
            [9425743, '8fd34f'],
            [3439425743, 'cd0178cf'],
            [1, 'o', $dict],
            [2, 'i', $dict],
            [3453, 'geg', $dict],
            [8753452, 'wtqoih', $dict],
            [8347582475, 'odowfpppj', $dict],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        $dict = 'fhdirngqxcv32098';
        
        return [
            ['', null],
            ['1', 1],
            ['2', 2],
            ['addcb', 712139],
            ['cccccc', 13421772],
            ['fd8', 47, $dict],
            ['x00hfgg', 148705382, $dict],
        ];
    }
}
