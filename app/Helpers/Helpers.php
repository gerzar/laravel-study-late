<?php

namespace App\Helpers;

use App\Models\Subscribe;
use App\Services\UnsubscribeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Helpers
{

    public static Auth $auth;
    public static Subscribe $subscribe;


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

    public static function isSubscribe(int $category_id): bool
    {
        $subscribeService = new UnsubscribeService();


        if ($subscribeService->getSubscribe($category_id))
            return true;

        return false;



    }

}
