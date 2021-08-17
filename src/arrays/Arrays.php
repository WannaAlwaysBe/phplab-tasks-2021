<?php

namespace arrays;

class Arrays implements ArraysInterface 
{
    /**
     * The $input variable contains an array of digits
     * Return an array which will contain the same digits but repetitive by its value
     * without changing the order.
     * Example: [1,3,2] => [1,3,3,3,2,2]
     *
     * @param array $input
     * @return array
     */
    public function repeatArrayValues(array $input): array
    {
        $repeatedArray = array();

        foreach ($input as $num) {
            $repeatedNums = array_fill(count($repeatedArray),$num, $num);
            $repeatedArray = array_merge($repeatedArray, $repeatedNums);
        }

        return $repeatedArray;
    }

    /**
    * The $input variable contains an array of digits
    * Return the lowest unique value or 0 if there is no unique values or array is empty.
    * Example: [1, 2, 3, 2, 1, 5, 6] => 3
    *
    * @param array $input
    * @return int
    */
    public function getUniqueValue(array $input): int
    {
        $lowestUniqueValue = 0;
        $countedValues = array_count_values($input);
        ksort($countedValues);

        foreach ($countedValues as $num => $count) {
            if ($count == 1) {
                $lowestUniqueValue = $num;
                break;
            }
        }

        return $lowestUniqueValue;
    }

    /**
     * The $input variable contains an array of arrays
     * Each sub array has keys: name (contains strings), tags (contains array of strings)
     * Return the list of names grouped by tags
     * !!! The 'names' in returned array must be sorted ascending.
     *
     * Example:
     * [
     *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
     *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
     *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
     * ]
     *
     * Should be transformed into:
     * [
     *  'fruit' => ['apple', 'orange'],
     *  'green' => ['apple'],
     *  'vegetable' => ['potato'],
     *  'yellow' => ['orange', 'potato'],
     * ]
     *
     * @param array $input
     * @return array
     */
    public function groupByTag(array $input): array
    {
        $transformedArray = array();
        foreach ($input as $subArray) {
            foreach($subArray['tags'] as $tag) {
                if (!array_key_exists($tag ,$transformedArray)) {
                    $transformedArray[$tag] = array();
                }
                $transformedArray[$tag][] = $subArray['name'];
                sort($transformedArray[$tag]);
            }
        }
        ksort($transformedArray);
        
        return $transformedArray;
    }
}