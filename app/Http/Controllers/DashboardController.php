<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.dashboard', [
                'user' => $user,
                'totalMahasiswa' => Mahasiswa::count(),
                'totalDosen' => Dosen::count(),
                'totalMatakuliah' => Matakuliah::count(),
                'totalKelas' => Kelas::count(),
            ]);
        } elseif ($user->role === 'mahasiswa') {
            return view('mahasiswa.dashboard', compact('user'));
        } elseif ($user->role === 'dosen') {
            return view('dosen.dashboard', compact('user'));
        } else {
            Auth::logout();
            return redirect()->route('auth.login');
        }
    }
}