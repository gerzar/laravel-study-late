<?php

namespace App\Http\Controllers\Fortify;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FortifyController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        \Auth::logout();
        return redirect('/login');
    }
}
