<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return array
 */
function getUniqueFirstLetters(array $airports): array
{
    $letters = array();

    foreach ($airports as $airport) {
        $firstLetter = substr($airport['name'], 0, 1);
        array_push($letters, $firstLetter);
    }

    $uniqueLetters = array_unique($letters);
    sort($uniqueLetters);

    return $uniqueLetters;
}

/**
 * @param  array  $airports
 * @return array
 */
function filterByFirstLetter(array $airports): array
{
    $airports = array_filter($airports, function($airport) {
        return substr($airport['name'], 0, 1) === $_GET['filter_by_first_letter'];
    });

    return $airports;
}

/**
 * @param  array  $airports
 * @return array
 */
function filterByState(array $airports): array
{
    $airports = array_filter($airports, function($airport) {
        return $airport['state'] === $_GET['filter_by_state'];
    });

    return $airports;
}

/**
 * @param string $task
 * @param string $parametr
 * @return string 
 */
function urlCreator(string $task, string $parametr): string
{
    $request = $_GET;
    $request[$task] = $parametr;

    if (
        $task == 'filter_by_first_letter' 
        || $task == 'filter_by_state'
        ) {
        $request['page'] = 1;
    }

    return '?' . http_build_query($request, '', '&');
}

/**
 * @param  array  $airports
 * @return array
 */
function sortByParametr(array $airports): array
{
    usort($airports, function($first, $second) {
        return strcmp($first[$_GET['sort']], $second[$_GET['sort']]);
    });

    return $airports;
}

/**
 * @param  array  $airports
 * @param int $airportsPerPage
 * @param int currentPage
 * @return array
 */
function paginator(array $airports, int $airportsPerPage, int $currentPage): array
{
    return array_slice($airports, ($currentPage-1) * $airportsPerPage, $airportsPerPage);
}
