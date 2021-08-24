<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, $this->functions->SayHelloArgument($arg));
    }

    public function positiveDataProvider(): array
    {
        return [
            [6, 'Hello 6'],
            ['User', 'Hello User'],
            [true, 'Hello 1']
        ];
    }
}