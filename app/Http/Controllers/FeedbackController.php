<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function new(FeedbackRequest $request, Feedback $feedback)
    {

        $request->validated();

        $feedback->fill($request->only('title', 'email', 'message', 'username'));

        if ($feedback->save()){
            return back()->with('message', 'Message has been send');
        }
        return back()->with('error', 'Something wrong');

    }
}
