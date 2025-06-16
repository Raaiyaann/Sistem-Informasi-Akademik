@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .glass-card {
        backdrop-filter: blur(8px);
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .form-input {
        background: #f9fafb;
        border: 1px solid #cbd5e1;
        color: #1e293b;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        background: #ffffff;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-white via-slate-100 to-white p-4 md:p-6 lg:p-8 flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute top-0 left-0 w-40 h-40 bg-blue-200 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-60 h-60 bg-purple-200 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-emerald-200 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 w-full max-w-2xl">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="floating-animation inline-block mb-4">
                <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Jadwal</h1>
            <p class="text-gray-600">Perbarui informasi jadwal perkuliahan</p>
        </div>

        <!-- Form -->
        <div class="glass-card rounded-2xl p-8">
            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Kelas -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select name="kelas_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}" {{ $jadwal->kelas_id == $k->id ? 'selected' : '' }}>
                                {{ $k->kode_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Mata Kuliah -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mata Kuliah</label>
                    <select name="mata_kuliah_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($mata_kuliah as $mk)
                            <option value="{{ $mk->id }}" {{ $jadwal->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                                {{ $mk->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dosen -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dosen</label>
                    <select name="dosen_id" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($dosens as $d)
                            <option value="{{ $d->id }}" {{ $jadwal->dosen_id == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Hari -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hari</label>
                    <input type="text" name="hari" value="{{ $jadwal->hari }}" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                </div>

                <!-- Jam -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                        <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
                        <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                    </div>
                </div>

                <!-- Ruangan -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ruangan</label>
                    <input type="text" name="ruangan" value="{{ $jadwal->ruangan }}" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" required>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Jadwal
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
