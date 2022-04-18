<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Services\UnsubscribeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SubscribesController extends Controller
{
    /**
     * @param int $category_id
     * @return JsonResponse
     */
    public function subscribe(int $category_id): JsonResponse
    {

        if (Auth::user()) {

            try {
                Subscribe::create([
                    'user_id' => Auth::user()->__get('id'),
                    'category_id' => $category_id
                ]);

                return response()->json(['message' => "You are successfully subscribed", "category_id" => $category_id]);

            } catch (\Exception) {

                return response()->json(['message' => 'Please, try again'], 403);

            }

        }
        return response()->json(['message' => 'You need to login'], 403);

    }

    /**
     * @param int $category_id
     * @param UnsubscribeService $unsubscribeService
     * @return JsonResponse
     */
    public function unsubscribe(int $category_id, UnsubscribeService $unsubscribeService): JsonResponse
    {

        $subscribe = $unsubscribeService->getSubscribe($category_id);

        try {
            $subscribe->delete();
            return response()->json(['message' => "You are successfully unsubscribed", 'category_id' => $category_id]);
        }catch(\Exception) {
            return response()->json(['message' => 'Please, try again'], 201);
        }

    }


}
