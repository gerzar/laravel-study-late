<?php

namespace App\Services;

use App\Models\Subscribe;
use Illuminate\Support\Facades\Auth;

class UnsubscribeService
{

    /**
     * @param int $category_id
     * @return Subscribe|bool
     */
    public function getSubscribe(int $category_id): Subscribe|bool
    {

        $subscribe = Subscribe::where('category_id', '=', $category_id)
            ->where('user_id', '=', Auth::user()->__get('id'))->first();

        if ($subscribe){
            return $subscribe;
        }
        return false;

    }
}
