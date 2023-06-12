<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile()
    {
    }

    public function profile(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('app.pages.profile.profile', compact('user'));
    }
}
