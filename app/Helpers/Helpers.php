<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helpers
{
    public static function checkIsFileLocal(string $url): bool
    {
        return Storage::disk('public')->exists($url);
    }

    public static function correctImageUrl(string $url): string
    {

        if (Helpers::checkIsFileLocal($url)) {
            return Storage::disk('public')->url($url);
        }

        return $url;

    }

}
