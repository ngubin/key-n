<?php

namespace KeyN\Tests;

use KeyN\Make\Key8;
use PHPUnit\Framework\TestCase;

class Key8Test extends TestCase
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
        $result = Key8::make($dict)->encode($number);
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
        $result = Key8::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        $dict = 'qwertyui';
        
        return [
            [-2, '2'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '2'],
            [3, '3'],
            [4, '4'],
            [5, '5'],
            [100, '144'],
            [1000, '1750'],
            [456453, '1573405'],
            [1, 'w', $dict],
            [2, 'e', $dict],
            [3, 'r', $dict],
            [4, 't', $dict],
            [5, 'y', $dict],
            [100, 'wtt', $dict],
            [1000, 'wiyq', $dict],
            [9345734587, 'wqyyqrwwruir', $dict],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        $dict = 'abcdefgh';
        
        return [
            ['', null],
            ['1', 1],
            ['2', 2],
            ['3', 3],
            ['4', 4],
            ['5', 5],
            ['452343', 152803],
            ['b', 1, $dict],
            ['fg', 46, $dict],
            ['ff', 45, $dict],
            ['gabcc', 24658, $dict],
            ['dedede', 116508, $dict],
            ['aabdfeeaa', 383232, $dict],
        ];
    }
}
