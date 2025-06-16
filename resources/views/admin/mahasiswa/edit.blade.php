@extends('layouts.app')

@section('page-title', 'Edit Mahasiswa')
@section('page-description', 'Perbarui data mahasiswa dalam sistem')

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
            <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Data Mahasiswa
        </h2>
        <p class="text-gray-500 mb-6">Perbarui informasi mahasiswa: <span class="text-emerald-600 font-medium">{{ $mahasiswa->nama }}</span></p>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="Username" value="{{ old('username', $mahasiswa->user->username ?? '') }}">
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="Nama Lengkap" value="{{ old('nama', $mahasiswa->nama) }}">
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
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="Email" value="{{ old('email', $mahasiswa->user->email ?? '') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengubah)</span></label>
                    <input type="password" name="password" id="password"
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="Masukkan password baru (opsional)">
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
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="NIM" value="{{ old('nim', $mahasiswa->nim) }}">
                    @error('nim')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Angkatan -->
                <div>
                    <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" required
                        class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2"
                        placeholder="Contoh: 2024" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
                    @error('angkatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Program Studi -->
            <div>
                <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                <select name="prodi_id" id="prodi_id" required
                    class="block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 shadow-sm px-4 py-2 bg-white">
                    <option value="" disabled>Pilih Program Studi</option>
                    @foreach($prodis as $p)
                        <option value="{{ $p->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                            {{ $p->nama }}
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
                    class="inline-flex items-center px-6 py-2.5 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
