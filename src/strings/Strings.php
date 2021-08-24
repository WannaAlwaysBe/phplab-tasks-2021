<?php 

namespace strings;

class Strings implements StringsInterface
{
    /**
     * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
     * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
     *
     * @param string $input
     * @return string
     */
    public function snakeCaseToCamelCase(string $input): string
    {
        return lcfirst(str_replace('_', '', ucwords($input, '_')));
    }

    /**
     * The $input variable contains multibyte text like 'ФЫВА олдж'
     * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
     * !!! do not change words order
     *
     * @param string $input
     * @return string
     */
    public function mirrorMultibyteString(string $input): string
    {
        $inputArray = explode(' ', $input);
        $mirroredArray = array();

        foreach ($inputArray as $word){
            preg_match_all('/./us', $word, $splitedWord);
            $word = join('', array_reverse($splitedWord[0]));
            array_push($mirroredArray, $word);
        }

        return implode(' ', $mirroredArray);
    }

    /**
     * My friend wants a new band name for her band.
     * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
     * However, when a noun STARTS and ENDS with the same letter,
     * she likes to repeat the noun twice and connect them together with the first and last letter,
     * combined into one word like so (WITHOUT a 'The' in front):
     * dolphin -> The Dolphin
     * alaska -> Alaskalaska
     * europe -> Europeurope
     * Implement this logic.
     *
     * @param string $noun
     * @return string
     */
    public function getBrandName(string $noun): string
    {
        $firstLetter = substr($noun, 0, 1);
        $lastLetter = substr($noun, -1, 1);
        $noun = ucfirst($noun);
        
        if ($firstLetter == $lastLetter) {
            return $noun . substr($noun, 1, strlen($noun));
        } else {
            return 'The ' . $noun;
        }
    }
}