@extends('layouts.mahasiswa')

@section('page-title', 'Tambah Mata Kuliah')
@section('page-description', 'Pilih mata kuliah untuk ditambahkan ke KRS')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Tambah Mata Kuliah</h2>
                <p class="text-gray-600">Pilih mata kuliah yang tersedia untuk ditambahkan ke KRS</p>
            </div>
        </div>
        
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-600">Semester:</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    Semester {{ $semester_aktif ?? 5 }}
                </span>
            </div>
            <a href="{{ route('krs.mahasiswa.index') }}" 
               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke KRS
            </a>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari mata kuliah..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                </div>
            </div>
            <div class="flex gap-3">
                <select id="semesterFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                    <option value="">Semua Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
                <select id="sksFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                    <option value="">Semua SKS</option>
                    <option value="1">1 SKS</option>
                    <option value="2">2 SKS</option>
                    <option value="3">3 SKS</option>
                    <option value="4">4 SKS</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Available Courses Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Mata Kuliah Tersedia</h3>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Total: </span>
                    <span id="totalCount" class="text-sm font-medium text-blue-600">{{ $jadwal->count() }}</span>
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kapasitas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @forelse ($jadwal as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200" 
                        data-nama="{{ strtolower($item->kelas->mata_kuliah->nama ?? '') }}"
                        data-semester="{{ $item->kelas->mata_kuliah->semester ?? '' }}"
                        data-sks="{{ $item->kelas->mata_kuliah->sks ?? '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-600 font-medium text-sm">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $item->kelas->mata_kuliah->kode ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($item->kelas->mata_kuliah->nama ?? 'M', 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $item->kelas->mata_kuliah->nama ?? '-' }}</div>
                                    <div class="text-sm text-gray-500">Semester {{ $item->kelas->mata_kuliah->semester ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ $item->kelas->mata_kuliah->sks ?? 3 }} SKS
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ $item->kelas->kode_kelas ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div>
                                <p class="font-medium">{{ $item->hari ?? '-' }}</p>
                                <p class="text-gray-500">{{ $item->jam_mulai ?? '-' }} - {{ $item->jam_selesai ?? '-' }}</p>
                                <p class="text-gray-500">{{ $item->kelas->ruangan ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs">
                                <p class="truncate">{{ $item->kelas->mata_kuliah->dosen_pengampu ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">{{ $item->kelas->kapasitas_terisi ?? 0 }}/{{ $item->kelas->kapasitas ?? 40 }}</span>
                                @if(($item->kelas->kapasitas_terisi ?? 0) >= ($item->kelas->kapasitas ?? 40))
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Penuh
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Tersedia
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @php
                                $sudah_diambil = in_array($item->id, $sudah_diambil_jadwal) || in_array($item->kelas->mata_kuliah_id ?? null, $sudah_diambil_mk);
                            @endphp
                            @if($sudah_diambil)
                                <button disabled class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg text-sm font-medium cursor-not-allowed">
                                    Sudah Diambil
                                </button>
                            @elseif(($item->kelas->kapasitas_terisi ?? 0) >= ($item->kelas->kapasitas ?? 40))
                                <button disabled 
                                        class="bg-gray-300 text-gray-500 px-4 py-2 rounded-lg text-sm font-medium cursor-not-allowed">
                                    Kelas Penuh
                                </button>
                            @else
                                <form action="{{ route('krs.store') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="jadwal_id" value="{{ $item->id }}">
                                    <button type="submit" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Tambah
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr id="emptyState">
                        <td colspan="9" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">Tidak ada mata kuliah tersedia</p>
                                    <p class="text-gray-400 text-sm">Silakan hubungi bagian akademik</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- KRS Guidelines -->
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
        <div class="flex items-start gap-4">
            <div class="w-8 h-8 text-yellow-600 flex-shrink-0 mt-1">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-yellow-900 mb-2">Panduan Pengisian KRS</h3>
                <div class="space-y-2 text-yellow-800">
                    <p>• Pastikan tidak ada konflik jadwal antar mata kuliah</p>
                    <p>• Perhatikan mata kuliah prasyarat sebelum mengambil mata kuliah lanjutan</p>
                    <p>• Maksimal SKS yang dapat diambil: <strong>24 SKS</strong></p>
                    <p>• Minimal SKS yang harus diambil: <strong>12 SKS</strong></p>
                    <p>• Konsultasikan dengan dosen pembimbing akademik jika diperlukan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Search and filter functionality
function filterTable() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const semesterFilter = document.getElementById('semesterFilter').value;
    const sksFilter = document.getElementById('sksFilter').value;
    const rows = document.querySelectorAll('#tableBody tr:not(#emptyState)');
    let visibleCount = 0;

    rows.forEach(row => {
        const nama = row.dataset.nama || '';
        const semester = row.dataset.semester || '';
        const sks = row.dataset.sks || '';

        const matchesSearch = nama.includes(searchTerm);
        const matchesSemester = !semesterFilter || semester === semesterFilter;
        const matchesSks = !sksFilter || sks === sksFilter;

        if (matchesSearch && matchesSemester && matchesSks) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    // Update counter
    document.getElementById('totalCount').textContent = visibleCount;

    // Show/hide empty state
    const emptyState = document.getElementById('emptyState');
    if (emptyState) {
        emptyState.style.display = visibleCount === 0 ? '' : 'none';
    }
}

// Event listeners
document.getElementById('searchInput').addEventListener('input', filterTable);
document.getElementById('semesterFilter').addEventListener('change', filterTable);
document.getElementById('sksFilter').addEventListener('change', filterTable);

// Auto-focus search on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').focus();
});
</script>
@endsection