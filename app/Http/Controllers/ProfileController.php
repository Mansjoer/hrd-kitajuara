<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserAttendance;
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

    public function attendance(Request $request, $slug)
    {
        $daysInMonth = Carbon::now()->daysInMonth;
        $user = User::where('slug', $slug)->first();
        $attendances = UserAttendance::where('user_id', $user->id)->paginate(7);
        return view('app.pages.profile.profile-attendance', compact('user', 'daysInMonth', 'attendances'));
    }
}
