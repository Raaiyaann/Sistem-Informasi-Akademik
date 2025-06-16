@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    .glass-card {
        background-color: white;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .form-input {
        background-color: #f1f5f9;
        border: 1px solid #cbd5e1;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        background-color: #e2e8f0;
    }
</style>

<div class="min-h-screen bg-gray-100 p-4 md:p-6 lg:p-8 flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
    <div class="relative z-10 w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="floating-animation inline-block mb-4">
                <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Jadwal</h1>
            <p class="text-gray-600">Buat jadwal perkuliahan baru</p>
        </div>

        <!-- Form -->
        <div class="glass-card rounded-2xl p-8">
            <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Kelas -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select name="kelas_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->kode_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Mata Kuliah -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mata Kuliah</label>
                    <select name="mata_kuliah_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($mata_kuliah as $mk)
                            <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dosen -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dosen</label>
                    <select name="dosen_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($dosens as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hari</label>
                    <input type="text" name="hari" placeholder="Hari (contoh: Senin)" class="form-input w-full px-4 py-3 rounded-xl placeholder-gray-500 focus:outline-none" required>
                </div>

                <!-- Jam -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Jadwal
                    </button>

                    <a href="{{ route('jadwal.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
