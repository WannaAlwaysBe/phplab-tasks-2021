<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider negativeDataProvider
     */
    public function testNegative($args)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->functions->countArgumentsWrapper(...$args);
    }

    public function negativeDataProvider(): array
    {
        return [
            [
                ['1', 2, '3']
            ],
            [
                ['1', ['2'], '3']
            ]
        ];
    }
}