<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Resource;
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

        $urls = Resource::all();

        foreach ($urls as $url) {
            dispatch(new NewsParsing($url->site_url));
        }

        return response("Works");

    }
}
