<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function myProfile()
    {
        $nama_bank = new Controller;
        $nama_bank = $nama_bank->namaBank();
        $user_bank = $nama_bank->where('sandi_bank', Auth::user()->employee->bank)->first();
        return view('app.pages.profile.my-profile', compact('user_bank'));
    }

    public function myProfileChangePhoto(Request $request)
    {
        $user = Auth::user();

        if ($user->employee->profile_path == null) {
        } else {
            if (file_exists(public_path($user->employee->profile_path))) {
                unlink(public_path($user->employee->profile_path));
            }
        }

        if ($request->hasFile('image')) {
            File::ensureDirectoryExists('images/profiles' . '/' . Auth::user()->nik);
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/profiles' . '/' . Auth::user()->nik, $name);
            $response = [
                'status' => 200,
                'success' => true,
                'data' =>  'images/profiles' . '/' . Auth::user()->nik . '/' . $name,
            ];
        }

        $user->employee->update([
            'profile_path' => 'images/profiles' . '/' . Auth::user()->nik . '/' . $name,
        ]);

        return response()->json($response);
    }

    function myProfileChangePassword()
    {
        return view('app.pages.profile.my-profile-change-password');
    }

    public function profile(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $nama_bank = new Controller;
        $nama_bank = $nama_bank->namaBank();
        $user_bank = $nama_bank->where('sandi_bank', $user->employee->bank)->first();

        return view('app.pages.profile.profile', compact('user', 'user_bank'));
    }

    public function profileChangePhoto(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        if ($user->employee->profile_path == null) {
        } else {
            if (file_exists(public_path($user->employee->profile_path))) {
                unlink(public_path($user->employee->profile_path));
            }
        }

        if ($request->hasFile('image')) {
            File::ensureDirectoryExists('images/profiles' . '/' . $user->nik);
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/profiles' . '/' . $user->nik, $name);
            $response = [
                'status' => 200,
                'success' => true,
                'data' =>  '/images/profiles' . '/' . $user->nik . '/' . $name,
            ];
        }

        $user->employee->update([
            'profile_path' => 'images/profiles' . '/' . $user->nik . '/' . $name,
        ]);

        return response()->json($response);
    }

    public function attendance(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        $daysInMonth = Carbon::now()->daysInMonth;
        $attendances = UserAttendance::where('user_id', $user->id)->paginate(7);
        return view('app.pages.profile.profile-attendance', compact('user', 'daysInMonth', 'attendances'));
    }

    public function changePassword(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('app.pages.profile.profile-change-password', compact('user'));
    }

    public function postChangePassword(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        $user->update([
            'password' => bcrypt($request->password)
        ]);
        $response = [
            'status' => 200,
            'success' => true,
            'data' => $user
        ];
        return response()->json($response);
    }

    public function postResetPassword(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        $user->update([
            'password' => bcrypt(123456)
        ]);
        $response = [
            'status' => 200,
            'success' => true,
            'data' => $user
        ];
        return response()->json($response);
    }
}
