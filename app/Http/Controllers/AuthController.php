<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.register', compact('roles'));
    }

    public function login()
    {
        $roles = ['admin', 'dosen', 'mahasiswa'];
        return view('auth.login', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,dosen,mahasiswa',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // penting!
            'role' => $request->role,
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            } elseif ($user->role === 'dosen') {
                return redirect()->route('dosen.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('auth.login')->with('error', 'Role tidak dikenal.');
            }
        }

        return back()->withErrors([
            'username' => 'Kredensial tidak sesuai.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Berhasil logout.');
    }
}
