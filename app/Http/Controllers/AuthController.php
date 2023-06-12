<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $response = [
                'success' => true,
                'code' => 200,
                'data' => [
                    'email' => $request->email,
                    'password' => $request->password,
                    'remember' => $request->remember
                ]
            ];
        } else {
            $response = [
                'success' => false,
                'code' => 200,
                'data' => [
                    'email' => $request->email,
                    'password' => $request->password,
                    'remember' => $request->remember
                ]
            ];
        }
        return response()->json($response);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
