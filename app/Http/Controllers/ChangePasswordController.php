<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('account.change-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password salah']);
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect('/u/' . $user->username)->with('password_changed', 'Password Berhasil diubah');
    }
}
