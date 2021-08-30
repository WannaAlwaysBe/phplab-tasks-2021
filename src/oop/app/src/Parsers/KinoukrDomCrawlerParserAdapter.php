<?php

namespace src\oop\app\src\Parsers;

use Symfony\Component\DomCrawler\Crawler;
use src\oop\app\src\Models\Movie;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    public function __construct()
    {
        $this->parser = new Crawler();
    }

    /**
     * @param string $siteContent
     * @return Movie 
     */
    public function parseContent(string $siteContent)
    {
        $this->parser->addHtmlContent($siteContent);

        $title = $this->parser->filter('.ftitle > h1')->text();
        $poster = $this->parser->filter('.fposter > a')->attr('href');
        $description = $this->parser->filter('.fdesc.full-text')->text();

        return new Movie($title, $poster, $description);
    }
}