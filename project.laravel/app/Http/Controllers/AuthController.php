<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        $google = 'https://accounts.google.com/o/oauth2/auth';
        $parameters = [
            'redirect_uri'  => 'http://f28f-91-123-150-234.ngrok.io/oauth/google/callback',
            'response_type' => 'code',
            'client_id'     => '990218787338-bp58r3af38ponaetgp4ap58bt9pbf35n.apps.googleusercontent.com',
            'scope'         => implode(' ', [
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            ]),
        ];
        $google .= '?' . http_build_query($parameters);

        return view('auth/form', compact('google'));
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
            }
            return redirect()->route('admin.panel');
        }

        return back()->withErrors([
            'email' => 'Неправильний пароль або email',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('main');
    }
}
