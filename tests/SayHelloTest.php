<?php

use PHPUnit\Framework\TestCase;

class SayHelloTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($expected)
    {
        $this->assertEquals($expected, $this->functions->SayHello());
    }

    public function positiveDataProvider(): array
    {
        return [
            ['Hello']
        ];
    }
}