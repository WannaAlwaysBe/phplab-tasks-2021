<?php

namespace src\oop\app\src\Transporters;

class CurlStrategy implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $transporter = curl_init($url);

        curl_setopt($transporter, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec(($transporter));
        
        curl_close($transporter);

        if (strpos($content, '<meta charset="windows-1251" />')) {
            return mb_convert_encoding($content, "UTF-8", "Windows-1251");
        }

        return $content;
    }
}