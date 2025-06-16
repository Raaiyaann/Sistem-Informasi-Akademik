@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
</style>

<div class="min-h-screen bg-gray-100 p-4 md:p-6 lg:p-8" style="font-family: 'Poppins', sans-serif;">
    <div class="max-w-7xl mx-auto space-y-8">
        <!-- Header -->
        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        Data Jadwal
                    </h1>
                    <p class="text-gray-600">Kelola jadwal perkuliahan semester aktif</p>
                </div>
                
                <a href="{{ route('jadwal.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-xl shadow hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Jadwal
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl p-6 shadow">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">No</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Kelas</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Mata Kuliah</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Dosen</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Hari</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Jam</th>
                            <th class="text-left py-4 px-4 text-emerald-600 font-semibold">Ruangan</th>
                            <th class="text-center py-4 px-4 text-emerald-600 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $j)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-4 text-gray-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="py-4 px-4 text-gray-800">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    </svg>
                                    {{ $j->kelas->kode_kelas ?? '-' }}
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-800">{{ $j->mataKuliah->nama ?? '-' }}</td>
                            <td class="py-4 px-4 text-gray-800">{{ $j->dosen->nama ?? '-' }}</td>
                            <td class="py-4 px-4 text-gray-800">{{ $j->hari }}</td>
                            <td class="py-4 px-4 text-gray-800">{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>
                            <td class="py-4 px-4 text-gray-800">{{ $j->ruangan }}</td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('jadwal.edit', $j->id) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-600 p-2 rounded-lg transition-all duration-300 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition-all duration-300 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
