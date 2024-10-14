<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    function index()
    {
        $username = Cookie::get('login_username');
        $password = Cookie::get('login_password');
        $remember = $username && $password;
        return view('auth.login', compact('username', 'password', 'remember'));
    }

    function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            if ($remember) {
                Cookie::queue('login_username', $request->username, 10080);
                Cookie::queue('login_password', $request->password, 10080);
            } else {
                Cookie::queue(Cookie::forget('login_username'));
                Cookie::queue(Cookie::forget('login_password'));
            }
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        $user_exist = User::where('username', $request->username)->exists();

        if (!$user_exist) {
            return back()->withInput()->withErrors(['username_not_found' => 'Username tidak ditemukan']);
        }

        # Password salah
        return back()->withInput()->withErrors(['password_wrong' => 'Password salah']);
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
