@extends('layouts.app')

@section('page-title', 'Tambah Mahasiswa')
@section('page-description', 'Tambahkan data mahasiswa baru ke sistem')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-8 mt-6">
        @if(session('success'))
            <div class="mb-6">
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif
        <h2 class="text-2xl font-bold text-gray-800 mb-2 flex items-center gap-2">
            <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            Tambah Mahasiswa Baru
        </h2>
        <p class="text-gray-500 mb-6">Lengkapi form berikut untuk menambahkan mahasiswa ke sistem.</p>
        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="Nama Lengkap" value="{{ old('nama') }}">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIM -->
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                    <input type="text" name="nim" id="nim" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="NIM" value="{{ old('nim') }}">
                    @error('nim')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Angkatan -->
                <div>
                    <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2"
                        placeholder="Contoh: 2024" value="{{ old('angkatan') }}">
                    @error('angkatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Program Studi -->
            <div>
                <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <select name="prodi_id" id="prodi_id" required
                    class="block w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm px-4 py-2 bg-white">
                    <option value="" disabled selected>Pilih Program Studi</option>
                    @foreach ($prodi as $prodis)
                        <option value="{{ $prodis->id }}" {{ old('prodi_id') == $prodis->id ? 'selected' : '' }}>
                            {{ $prodis->nama }}
                        </option>
                    @endforeach
                </select>
                @error('prodi_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('mahasiswa.index') }}"
                   class="inline-flex items-center px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 transition font-medium">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-2.5 rounded-lg bg-emerald-600 text-white font-semibold shadow hover:bg-emerald-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
