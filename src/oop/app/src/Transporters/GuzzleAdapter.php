<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    public function __construct()
    {
        $this->transporter = new Client();
    }

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $content = $this->transporter->request('GET', $url);
        
        if (in_array('text/html; charset=windows-1251', $content->getHeader('Content-Type'))) {
            return mb_convert_encoding($content->getBody(), "UTF-8", "Windows-1251");
        }

        return $content->getBody();
    }
}