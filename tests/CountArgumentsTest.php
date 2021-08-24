<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    protected $functions;

    protected function setUp(): void
    {
        $this->functions = new functions\Functions();
    }

    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($args, $expected)
    {
        $this->assertEquals($expected, $this->functions->countArguments(...$args));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [],
                [
                    'argument_count' => 0,
                    'argument_values' => []
                ]
            ],
            [
                ['1'],
                [
                    'argument_count' => 1,
                    'argument_values' => ['1']
                ]
            ],
            [
                ['1', '2', '3', '4'],
                [
                    'argument_count' => 4,
                    'argument_values' => ['1', '2', '3', '4']
                ]
            ]
        ];
    }
}