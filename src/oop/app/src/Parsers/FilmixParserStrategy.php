<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    const PATERN = array(
        'title' => '/<h1 class="name" itemprop="name">(.*?)<\/h1>/',
        'poster' => '/<img src="(.+?)" class="poster poster-tooltip"/',
        'description' => '/<div class="full-story">(.*?)<\/div>/'
    );
    
    /**
     * @param string $siteContent
     * @return Movie
     */
    public function parseContent(string $siteContent)
    {
        $data = array();

        foreach (self::PATERN as $key => $patern) {
            preg_match($patern, $siteContent, $matches);
            $data[$key] = $matches[1];
        }

        return new Movie($data['title'], $data['poster'], $data['description']);
    }
}