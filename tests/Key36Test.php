<?php

namespace KeyN\Tests;

use KeyN\Make\Key36;
use PHPUnit\Framework\TestCase;

class Key36Test extends TestCase
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
        $result = Key36::make($dict)->encode($number);
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
        $result = Key36::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        $dict = 'K9erjZJ0PIuL3yC7$A+lW2Exi8SYBUn6R-tw';
        
        return [
            [-2, '2'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '2'],
            [4353, '3cx'],
            [8347343, '4ywun'],
            [2842347234, '1b09d5u'],
            [1, '9', $dict],
            [2, 'e', $dict],
            [2384, '9nP', $dict],
            [9348598, 'ZWy7u', $dict],
            [2387462734, '9rA7E9u', $dict],
            [9237486121923, 'rI6xjS3Rr', $dict],
            [3493423847923472, 'tCL3Yy+UlW', $dict],
            [5545792499234792474, '9Jjnryu8-uRKe', $dict],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        $dict = 'wVC4fq1nQUYoMejklF3Hv$-mGbOcTK8Xh0J9';

        return [
            ['', null],
            ['1', 1],
            ['2', 2],
            ['abcd', 481261],
            ['kdsf', 950991],
            ['$9000', 36948885, $dict],
            ['wwoGb0c', 19629135, $dict],
        ];
    }
}
