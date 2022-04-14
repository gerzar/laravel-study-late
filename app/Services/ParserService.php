<?php

namespace App\Services;

use App\Contracts\Parser;
use App\Models\ParsedNews;
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
     * @return void
     */
    public function saveData(): void
    {
        $xml = XmlParserLib::load($this->url);

        $data = $xml->parse([
            'news' => [
                'uses' => 'channel.item[title,category,link,pubDate,author,description]'
            ]
        ]);

        foreach ($data as $items) {
            foreach ($items as $item) {
                ParsedNews::create($item);
            }
        }

    }

}
