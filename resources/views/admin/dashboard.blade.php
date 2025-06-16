@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan sistem informasi akademik')

@section('content')
<div class="space-y-8">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow flex flex-col lg:flex-row items-center justify-between gap-8">
        <!-- Left Content -->
        <div class="flex-1">
            <h1 class="text-3xl lg:text-4xl font-bold mb-2">
                Selamat Datang,
                <span class="text-blue-200">{{$user->username}}</span>
            </h1>
            <div class="flex items-center gap-2 mb-4">
                <span class="inline-block w-2 h-2 bg-green-400 rounded-full"></span>
                <span class="text-blue-100 text-sm">Tahun Ajaran 2025/2026</span>
            </div>
        </div>
        <!-- Right Content - Illustration -->
        <div class="flex-shrink-0 flex justify-center">
            <div class="w-40 h-40 lg:w-56 lg:h-56 bg-white/10 rounded-full flex items-center justify-center">
                <svg class="w-24 h-24 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Mahasiswa Card -->
        <div class="bg-white rounded-xl p-6 shadow border border-gray-200 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    </svg>
                </div>
                <span class="text-2xl">📊</span>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium text-sm mb-1">Total Mahasiswa</h3>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalMahasiswa }}</p>
                <p class="text-green-600 text-xs">+12% dari tahun lalu</p>
            </div>
        </div>
        
        <!-- Dosen Card -->
        <div class="bg-white rounded-xl p-6 shadow border border-gray-200 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <span class="text-2xl">👨‍🏫</span>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium text-sm mb-1">Total Dosen</h3>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalDosen }}</p>
                <p class="text-green-600 text-xs">+3 dosen baru</p>
            </div>
        </div>
        
        <!-- Mata Kuliah Card -->
        <div class="bg-white rounded-xl p-6 shadow border border-gray-200 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-2xl">📚</span>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium text-sm mb-1">Mata Kuliah</h3>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalMatakuliah }}</p>
                <p class="text-gray-500 text-xs">Semester aktif</p>
            </div>
        </div>
        
        <!-- Kelas Card -->
        <div class="bg-white rounded-xl p-6 shadow border border-gray-200 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-2xl">🏫</span>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium text-sm mb-1">Total Kelas</h3>
                <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalKelas }}</p>
                <p class="text-gray-500 text-xs">Kelas aktif</p>
            </div>
        </div>
    </div>
    
    <!-- System Status -->
    <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-3">
            <span class="w-6 h-6 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </span>
            Status Sistem
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-900">Server Online</p>
                <p class="text-gray-500 text-xs">99.9% Uptime</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-900">Database</p>
                <p class="text-gray-500 text-xs">Optimal</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <p class="font-semibold text-gray-900">Keamanan</p>
                <p class="text-gray-500 text-xs">Terlindungi</p>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-3">
            <div class="flex items-center p-4 bg-green-50 rounded-lg border border-green-200">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-4"></span>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Mahasiswa baru terdaftar</p>
                    <p class="text-xs text-gray-500">5 menit yang lalu</p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                <span class="w-2 h-2 bg-blue-500 rounded-full mr-4"></span>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Backup database berhasil</p>
                    <p class="text-xs text-gray-500">1 jam yang lalu</p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-4"></span>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Update sistem tersedia</p>
                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Info -->
    <div class="bg-white rounded-xl p-6 shadow border border-gray-200 text-center">
        <p class="text-gray-600 mb-1">Sistem Informasi Akademik</p>
        <p class="text-xs text-gray-500">© 2025 SIAKAD. Semua hak dilindungi undang-undang.</p>
        <div class="flex justify-center items-center gap-4 mt-3 text-xs text-gray-500">
            <span class="flex items-center">
                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                Online
            </span>
            <span>|</span>
            <span>Versi 2.1.0</span>
            <span>|</span>
            <span>Last Update: 24 Mei 2025</span>
        </div>
    </div>
</div>
@endsection