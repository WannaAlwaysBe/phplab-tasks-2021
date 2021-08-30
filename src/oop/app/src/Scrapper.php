<?php
/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */

namespace src\oop\app\src;

use src\oop\app\src\Transporters\TransportInterface;
use src\oop\app\src\Parsers\ParserInterface;

class Scrapper
{
    private $transporter;
    private $parser;

    public function __construct(TransportInterface $transporter, ParserInterface $parser)
    {
        $this->transporter = $transporter;
        $this->parser = $parser;
    }

    public function getMovie(string $url)
    {
        return $this->parser->parseContent($this->transporter->getContent($url));
    }
}