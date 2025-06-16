@extends('layouts.mahasiswa')

@section('page-title', 'Dashboard')
@section('page-description', 'Selamat datang di SIAKAD Universitas Tadulako')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">
                    Selamat Datang, <span class="text-blue-100">{{ Auth::user()->name ?? 'Mahasiswa' }}</span>
                </h1>
                <p class="text-blue-100 mb-4">
                    {{ Auth::user()->mahasiswa->nim ?? 'NIM: -' }} | 
                    {{ Auth::user()->mahasiswa->prodi->nama ?? 'Program Studi' }}
                </p>
                
                <div class="inline-flex items-center gap-2 bg-white/20 rounded-full px-4 py-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm font-medium">Tahun Ajaran 2025/2026</span>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="w-32 h-32 bg-white/10 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">SKS Diambil</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $sks_diambil ?? 21 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Mata Kuliah</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah_count ?? 7 }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">IPK</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $ipk ?? '3.75' }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Semester</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $semester ?? 5 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="{{ route('krs.mahasiswa.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">KRS</h3>
                    <p class="text-sm text-gray-600">Kartu Rencana Studi</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">Jadwal Kuliah</h3>
                    <p class="text-sm text-gray-600">Jadwal Perkuliahan</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">Nilai</h3>
                    <p class="text-sm text-gray-600">Hasil Studi</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Academic Progress -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Progress Akademik</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- SKS Progress -->
            <div class="text-center">
                <div class="relative w-24 h-24 mx-auto mb-3">
                    <svg class="w-24 h-24 transform -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                        <circle cx="50" cy="50" r="40" stroke="#3b82f6" stroke-width="8" fill="none" 
                                stroke-dasharray="251.2" stroke-dashoffset="{{ 251.2 - (($sks_diambil ?? 21) / 144 * 251.2) }}"
                                class="transition-all duration-500"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-lg font-bold text-gray-900">{{ round((($sks_diambil ?? 21) / 144) * 100) }}%</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600">SKS Tercapai</p>
                <p class="text-xs text-gray-500">{{ $sks_diambil ?? 21 }}/144 SKS</p>
            </div>
            
            <!-- Semester Progress -->
            <div class="text-center">
                <div class="relative w-24 h-24 mx-auto mb-3">
                    <svg class="w-24 h-24 transform -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                        <circle cx="50" cy="50" r="40" stroke="#10b981" stroke-width="8" fill="none" 
                                stroke-dasharray="251.2" stroke-dashoffset="{{ 251.2 - (($semester ?? 5) / 8 * 251.2) }}"
                                class="transition-all duration-500"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-lg font-bold text-gray-900">{{ round((($semester ?? 5) / 8) * 100) }}%</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600">Semester</p>
                <p class="text-xs text-gray-500">{{ $semester ?? 5 }}/8 Semester</p>
            </div>
            
            <!-- IPK Status -->
            <div class="text-center">
                <div class="relative w-24 h-24 mx-auto mb-3">
                    <svg class="w-24 h-24 transform -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none"/>
                        <circle cx="50" cy="50" r="40" stroke="#f59e0b" stroke-width="8" fill="none" 
                                stroke-dasharray="251.2" stroke-dashoffset="{{ 251.2 - ((($ipk ?? 3.75) / 4) * 251.2) }}"
                                class="transition-all duration-500"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-lg font-bold text-gray-900">{{ $ipk ?? '3.75' }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-600">IPK</p>
                <p class="text-xs text-gray-500">Skala 4.00</p>
            </div>
        </div>
    </div>

    <!-- Motivational Quote -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-start gap-4">
            <div class="w-8 h-8 text-blue-600 flex-shrink-0 mt-1">
                <svg fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                </svg>
            </div>
            <div>
                <p class="text-gray-700 italic leading-relaxed text-lg mb-3">
                    "Pendidikan adalah senjata paling ampuh yang bisa kamu gunakan untuk mengubah dunia."
                </p>
                <p class="text-blue-600 text-sm font-semibold">— Nelson Mandela</p>
            </div>
        </div>
    </div>
</div>
@endsection