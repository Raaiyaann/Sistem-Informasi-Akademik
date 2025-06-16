@extends('layouts.mahasiswa')

@section('page-title', 'Profil Mahasiswa')
@section('page-description', 'Informasi akun dan data pribadi mahasiswa')

@section('content')
<div class="space-y-6">
    <!-- Profile Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <div class="text-center">
            <!-- Avatar -->
            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <span class="text-white font-bold text-2xl">{{ substr(Auth::user()->name ?? 'M', 0, 1) }}</span>
            </div>
            
            <!-- User Info -->
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ Auth::user()->name ?? 'Nama Mahasiswa' }}</h1>
            <p class="text-gray-600 mb-4">{{ Auth::user()->mahasiswa->nim ?? 'NIM: -' }}</p>
            
            <!-- Status Badge -->
            <div class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-4 py-2 rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">Mahasiswa Aktif</span>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Personal Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-900">Informasi Pribadi</h2>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->mahasiswa->nama ?? Auth::user()->name ?? '-' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">NIM</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->mahasiswa->nim ?? '-' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->email ?? '-' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Program Studi</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->mahasiswa->prodi->nama ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-900">Informasi Akademik</h2>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Semester</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->mahasiswa->semester ?? 'Semester 5' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Tahun Masuk</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">{{ Auth::user()->mahasiswa->tahun_masuk ?? '2022' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <span class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Aktif
                        </span>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Tahun Ajaran</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3">
                        <p class="text-gray-900 font-medium">2025/2026</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Section -->
    <div class="bg-red-50 border border-red-200 rounded-xl p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Keluar dari Sistem</h3>
                    <p class="text-gray-600">Akhiri sesi dan kembali ke halaman login</p>
                </div>
            </div>
            
          <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="inline">
    @csrf
     @method('DELETE')
    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold flex items-center gap-2 transition-colors duration-200 w-full">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
        </svg>
        Logout
    </button>
</form>

        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ $total_krs ?? 21 }}</p>
            <p class="text-sm text-gray-600">SKS Diambil</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ $ipk ?? '3.75' }}</p>
            <p class="text-sm text-gray-600">IPK</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ $semester ?? 5 }}</p>
            <p class="text-sm text-gray-600">Semester</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 text-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah ?? 7 }}</p>
            <p class="text-sm text-gray-600">Mata Kuliah</p>
        </div>
    </div>

    @if (session('status'))
    <div class="mb-6">
        <div class="rounded-xl bg-gradient-to-r from-green-400 via-blue-400 to-purple-400 p-1 shadow">
            <div class="flex items-center gap-3 bg-white rounded-lg px-5 py-4">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-base font-semibold text-gray-800">{{ session('status') }}</span>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection