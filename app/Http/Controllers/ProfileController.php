<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function admin()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function dosen()
    {
        $user = Auth::user();
        return view('dosen.profile', compact('user'));
    }
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.profile', compact('user'));
    }
}
