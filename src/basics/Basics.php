<?php

namespace basics;

class Basics implements BasicsInterface 
{
    private $validator;

    function __construct(BasicsValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
     * Determine in which quarter of an hour the number falls.
     * Return one of the values: "first", "second", "third" and "fourth".
     * Throw InvalidArgumentException if $minute is negative of greater then 60.
     *
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        $quarterArray = [
            1 => 'first',
            2 => 'second',
            3 => 'third',
            4 => 'fourth'
        ];

        if ($minute === 0) {
            $quarter = 4;
        } else {
            $quarter = ceil($minute / 15);
        }

        return $quarterArray[$quarter];
    }

    /**
     * The $year variable contains a year (i.e. 1995 or 2020 etc).
     * Return true if the year is Leap or false otherwise.
     * Throw InvalidArgumentException if $year is lower then 1900.
     *
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool
    {
        $this->validator->isYearException($year);
        
        if ($year % 4 != 0) {
            return false;
        } elseif ($year % 100 != 0) {
            return true;
        } elseif ($year % 400 != 0) {
            return false;
        } else {
            return true;
        }
    }

        /**
     * The $input variable contains a string of six digits (like '123456' or '385934').
     * Return true if the sum of the first three digits is equal with the sum of last three ones
     * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
     * Throw InvalidArgumentException if $input contains more then 6 digits.
     *
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);

        $inputArray = str_split($input);

        $firstDigitsSum = array_sum(array_slice($inputArray, 0, 3));
        $lastDigitsSum = array_sum(array_slice($inputArray, 3));

        return $firstDigitsSum == $lastDigitsSum;
    }
}