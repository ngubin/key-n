<?php

namespace KeyN\Tests;

use KeyN\Make\Key62;
use PHPUnit\Framework\TestCase;

class Key62Test extends TestCase
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
        $result = Key62::make($dict)->encode($number);
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
        $result = Key62::make($dict)->decode($key);
        $this->assertEquals($number, $result);
    }

    /**
     * @return array[]
     */
    public function dataSuccessEncodeList(): array
    {
        $dict = 'ixYH7TohWy$LV9Esp*%CK0jzl8euRrAXbMwFnD5Gc=6ZfvgBm-QdS4JkUq+O32';
        
        return [
            [-2, '2'],
            [-1, '1'],
            [0, null],
            [1, '1'],
            [2, '2'],
            [6234, '1Cy'],
            [9387592, 'Do8M'],
            [9283749242, 'a8hFh0'],
            [2734628472364, 'M8Y6nOA'],
            [2139492346283648, '9NwXG1oL6'],
            [1, 'x', $dict],
            [2, 'Y', $dict],
            [4234, 'xo%', $dict],
            [3845983, 'pWX2', $dict],
            [9237423662, '$Ty*JE', $dict],
            [9237498236422, 'Y5GW4Vd7', $dict],
            [3493475263727452, 'piinc$GWb', $dict],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessDecodeList(): array
    {
        $dict = 'xhiP+eNrvnW5$Jj2B7HK8-LEF6u1SUyI%z=dc94YGCfablso3XOTpmZV*ktAgw';

        return [
            ['', null],
            ['1', 1],
            ['2', 2],
            ['dsfsf', 198824963],
            ['mfgke', 328717070],
            ['fIpon5', 38948219653, $dict],
            ['8HWs', 4836418, $dict],
        ];
    }
}
