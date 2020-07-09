<?php

namespace KeyN\Tests;

use KeyN\Exceptions\KeyNException;
use KeyN\Make\KeyNAbstract;
use PHPUnit\Framework\TestCase;

class MakeTest extends TestCase
{
    /**
     * @dataProvider dataSuccessMakeList
     *
     * @param string $classname
     */
    public function testSuccessMake(string $classname)
    {
        /** @var KeyNAbstract $classname */

        try {
            $classname::make();
            $this->assertTrue(true);
        } catch (KeyNException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider dataSuccessMakeWithDictList
     *
     * @param string $classname
     * @param string $dict
     */
    public function testSuccessMakeWithDict(string $classname, string $dict)
    {
        /** @var KeyNAbstract $classname */

        try {
            $classname::make($dict);
            $this->assertTrue(true);
        } catch (KeyNException $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @dataProvider dataExceptionMakeWithDictList
     *
     * @param string $classname
     * @param string $dict
     */
    public function testExceptionMakeWithDict(string $classname, string $dict)
    {
        /** @var KeyNAbstract $classname */

        try {
            $classname::make($dict);
            $this->fail();
        } catch (KeyNException $exception) {
            $this->assertTrue(true, $exception->getMessage());
        }
    }

    /**
     * @return string[][]
     */
    public function dataSuccessMakeList(): array
    {
        return [
            [\KeyN\Make\Key2::class],
            [\KeyN\Make\Key3::class],
            [\KeyN\Make\Key8::class],
            [\KeyN\Make\Key16::class],
            [\KeyN\Make\Key36::class],
            [\KeyN\Make\Key62::class],
        ];
    }

    /**
     * @return array[]
     */
    public function dataSuccessMakeWithDictList(): array
    {
        return [
            [\KeyN\Make\Key2::class, ''],
            [\KeyN\Make\Key2::class, '01'],
            [\KeyN\Make\Key2::class, 'ab'],
            [\KeyN\Make\Key2::class, 'ab '],
        ];
    }

    /**
     * @return array[]
     */
    public function dataExceptionMakeWithDictList(): array
    {
        return [
            [\KeyN\Make\Key2::class, '0'],
            [\KeyN\Make\Key2::class, '012'],
            [\KeyN\Make\Key2::class, 'aa'],
            [\KeyN\Make\Key2::class, 'a b'],
        ];
    }
}
