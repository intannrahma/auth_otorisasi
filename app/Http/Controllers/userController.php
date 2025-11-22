<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();
        return view('profile', compact('user'));
    }
}