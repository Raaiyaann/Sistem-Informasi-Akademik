@extends('layouts.app')

@section('page-title', 'Tambah Kelas')
@section('page-description', 'Tambahkan data kelas baru ke sistem')

@section('content')
<div class="max-w-4xl mx-auto font-sans">
    <!-- Header -->
    <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8 shadow-sm">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Kelas Baru</h2>
                <p class="text-gray-500">Lengkapi form di bawah untuk menambahkan kelas</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
        <form action="{{ route('kelas.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Kode Kelas & Ruangan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="kode_kelas" class="block text-sm font-medium text-gray-700">Kode Kelas</label>
                    <input type="text" 
                           id="kode_kelas" 
                           name="kode_kelas" 
                           placeholder="Contoh: TI-1A"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
                           value="{{ old('kode_kelas') }}"
                           required>
                    @error('kode_kelas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="ruangan" class="block text-sm font-medium text-gray-700">Ruangan</label>
                    <input type="text" 
                           id="ruangan" 
                           name="ruangan" 
                           placeholder="Contoh: TI 1"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:outline-none"
                           value="{{ old('ruangan') }}"
                           required>
                    @error('ruangan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mata Kuliah -->
            <div class="space-y-2">
                <label for="mata_kuliah_id" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                <select name="mata_kuliah_id" 
                        id="mata_kuliah_id" 
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-green-500 focus:outline-none"
                        required>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    @foreach($mata_kuliah as $mk)
                        <option value="{{ $mk->id }}" 
                                {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->nama }} ({{ $mk->kode }})
                        </option>
                    @endforeach
                </select>
                @error('mata_kuliah_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Info Section -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <div class="text-blue-500 mt-1">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-blue-700 font-semibold mb-1">Informasi Kelas</h4>
                        <p class="text-gray-600 text-sm">
                            Setelah memilih mata kuliah, dosen pengampu akan otomatis ditampilkan berdasarkan data mata kuliah yang dipilih.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('kelas.index') }}" 
                   class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-100 transition">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 rounded-lg text-white bg-green-500 hover:bg-green-600 transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
