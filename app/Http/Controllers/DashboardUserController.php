<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query, $search) {
            return $query->where('fullname', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->get();

        return view('dashboard.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_data = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'address' => 'nullable|max:255',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $user_data['email'] = strtolower($user_data['email']);
        // Meng-enskripsi password
        $user_data['password'] = bcrypt($user_data['password']);
        // Set Role
        $user_data['role'] = $request->role ?? 'user';
        // Menambahkan data user
        User::create($user_data);
        return redirect('/dashboard/users')->with('registered', 'Berhasil mendaftar, silahkan login');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return redirect('/u/' . $user->username);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
