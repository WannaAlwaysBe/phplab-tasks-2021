<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($arg)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->sayHelloArgumentWrapper($arg);
    }

    public function negativeDataProvider(): array
    {
        return [
            [null],
            [[]]
        ];
    }
}