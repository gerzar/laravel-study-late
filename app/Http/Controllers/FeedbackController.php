<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {

        //return response( $request->only('title', 'email', 'message', 'username'));


        return redirect()->route('about')->with('message', 'Message has been send');

    }
}
