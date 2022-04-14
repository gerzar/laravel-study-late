<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Parser $parser
     */
    public function __invoke(Request $request, Parser $parser)
    {
        dd(
            $parser->setUrl("https://www.goha.ru/rss/news")
                    ->getData()
        );
    }
}
