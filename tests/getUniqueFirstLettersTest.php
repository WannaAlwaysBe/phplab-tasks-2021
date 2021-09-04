<?php

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($args, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($args));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    ["name" => "Washington Ronald Reagan National Airport"],
                    ["name" => "Charleston International Airport"],
                    ["name" => "Atlanta Hartsfield International Airport"],
                    ["name" => "Detroit Metro Airport"]
                ],
                ["A", "C", "D", "W"]
            ]
        ];
    }
}
