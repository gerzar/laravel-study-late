<?php

namespace App\Services;

use App\Contracts\Parser;
use XmlParserLib;

class ParserService implements Parser
{

    protected string $url;

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $xml = XmlParserLib::load($this->url);

        return $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,category,link,pubDate,author,description]'
            ]
        ]);
    }
}
