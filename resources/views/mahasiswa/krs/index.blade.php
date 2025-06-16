@extends('layouts.mahasiswa')

@section('page-title', 'Kartu Rencana Studi (KRS)')
@section('page-description', 'Kelola mata kuliah yang diambil semester ini')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Kartu Rencana Studi</h2>
                <p class="text-gray-600">Daftar mata kuliah yang diambil semester ini</p>
            </div>
            <a href="{{ route('krs.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg text-white font-medium shadow-sm flex items-center gap-2 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Mata Kuliah
            </a>
        </div>
    </div>

    <!-- KRS Summary -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Mata Kuliah</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $krs->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total SKS</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $total_sks ?? $krs->sum(function($item) { return optional(optional(optional($item->jadwal)->kelas)->mata_kuliah)->sks ?? 0; }) }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Semester</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $semester_aktif ?? 5 }}</p>
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
                    <p class="text-gray-600 text-sm font-medium">Tahun Ajaran</p>
                    <p class="text-2xl font-bold text-gray-900">2025/2026</p>
                </div>
            </div>
        </div>
    </div>

    <!-- KRS Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Mata Kuliah</h3>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Total: </span>
                    <span class="text-sm font-medium text-blue-600">{{ $krs->count() }}</span>
                    <span class="text-sm text-gray-600">mata kuliah</span>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($krs as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 font-medium text-sm">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $item->jadwal->kelas->mata_kuliah->kode ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($item->jadwal->kelas->mata_kuliah->nama ?? 'M', 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</div>
                                    <div class="text-sm text-gray-500">Semester {{ $item->jadwal->kelas->mata_kuliah->semester ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ $item->jadwal->kelas->kode_kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ optional(optional(optional($item->jadwal)->kelas)->mata_kuliah)->sks ?? 3 }} SKS
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs">
                                <p class="truncate">{{ $item->jadwal->kelas->mata_kuliah->dosen_pengampu ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div>
                                <p class="font-medium">{{ $item->jadwal->hari ?? '-' }}</p>
                                <p class="text-gray-500">{{ $item->jadwal->jam_mulai ?? '-' }} - {{ $item->jadwal->jam_selesai ?? '-' }}</p>
                                <p class="text-gray-500">{{ $item->jadwal->kelas->ruangan ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center gap-2">
                                <form action="{{ route('krs.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete('{{ $item->jadwal->kelas->mata_kuliah->nama ?? 'mata kuliah ini' }}');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                            title="Hapus dari KRS">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">Belum ada mata kuliah yang diambil</p>
                                    <p class="text-gray-400 text-sm">Mulai dengan menambahkan mata kuliah ke KRS</p>
                                </div>
                                <a href="{{ route('krs.create') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    Tambah Mata Kuliah
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- KRS Information -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-start gap-4">
            <div class="w-8 h-8 text-blue-600 flex-shrink-0 mt-1">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-blue-900 mb-2">Informasi KRS</h3>
                <div class="space-y-2 text-blue-800">
                    <p>• Batas maksimal SKS yang dapat diambil: <strong>24 SKS</strong></p>
                    <p>• Batas minimal SKS yang harus diambil: <strong>12 SKS</strong></p>
                    <p>• Periode pengisian KRS: <strong>1-15 Januari 2025</strong></p>
                    <p>• Konsultasikan pemilihan mata kuliah dengan dosen pembimbing akademik</p>
                </div>
            </div>
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
    @if (session('error'))
    <div class="mb-6">
        <div class="rounded-xl bg-gradient-to-r from-red-400 via-yellow-400 to-pink-400 p-1 shadow">
            <div class="flex items-center gap-3 bg-white rounded-lg px-5 py-4">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="text-base font-semibold text-gray-800">{{ session('error') }}</span>
            </div>
        </div>
    </div>
    @endif


<script>
// Confirm delete function
function confirmDelete(mataKuliah) {
    return confirm(`Yakin ingin menghapus "${mataKuliah}" dari KRS?

Tindakan ini tidak dapat dibatalkan.`);
}

// Print KRS function
function printKRS() {
    window.print();
}

// Auto-focus search on page load
document.addEventListener('DOMContentLoaded', function() {
    // Add any initialization code here
});
</script>
@endsection