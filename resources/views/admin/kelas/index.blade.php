@extends('layouts.app')

@section('page-title', 'Data Kelas')
@section('page-description', 'Kelola data kelas sistem informasi akademik')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Data Kelas</h2>
                <p class="text-gray-600">Kelola informasi kelas dalam sistem akademik</p>
            </div>
            <a href="{{ route('kelas.create') }}" 
               class="bg-emerald-600 hover:bg-emerald-700 px-6 py-3 rounded-lg text-white font-medium shadow-sm flex items-center gap-2 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Kelas
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Kelas</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kelas->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Kelas Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kelas->where('status', 'aktif')->count() ?? $kelas->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Ruangan</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kelas->pluck('ruangan')->unique()->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Mata Kuliah</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $kelas->pluck('mata_kuliah_id')->unique()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari kelas berdasarkan kode, ruangan, atau mata kuliah..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                </div>
            </div>
            <div class="flex gap-3">
                <select id="ruanganFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                    <option value="">Semua Ruangan</option>
                    @foreach($kelas->pluck('ruangan')->unique()->sort() as $ruangan)
                        <option value="{{ $ruangan }}">{{ $ruangan }}</option>
                    @endforeach
                </select>
                <select id="mataKuliahFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-200">
                    <option value="">Semua Mata Kuliah</option>
                    @foreach($kelas->pluck('mata_kuliah.nama')->unique()->sort() as $mataKuliah)
                        @if($mataKuliah)
                            <option value="{{ $mataKuliah }}">{{ $mataKuliah }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Kelas</h3>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Total: </span>
                    <span id="totalCount" class="text-sm font-medium text-emerald-600">{{ $kelas->count() }}</span>
                    <span class="text-sm text-gray-600">kelas</span>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruangan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen Pengampu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kapasitas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @forelse ($kelas as $k)
                    <tr class="hover:bg-gray-50 transition-colors duration-200" 
                        data-kode="{{ strtolower($k->kode_kelas) }}" 
                        data-ruangan="{{ strtolower($k->ruangan) }}" 
                        data-mata-kuliah="{{ strtolower($k->mata_kuliah->nama ?? '') }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                <span class="text-emerald-600 font-medium text-sm">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $k->kode_kelas }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $k->ruangan }}</div>
                                    <div class="text-sm text-gray-500">Ruang Kelas</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-green-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($k->mata_kuliah->nama ?? 'N', 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $k->mata_kuliah->nama ?? '-' }}</div>
                                    <div class="text-sm text-gray-500">
                                        @if($k->mata_kuliah)
                                            {{ $k->mata_kuliah->kode }} - {{ $k->mata_kuliah->sks }} SKS
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs">
                                <p class="truncate">{{ $k->mata_kuliah->dosen_pengampu ?? '-' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ $k->kapasitas ?? 30 }} mahasiswa
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center gap-2">
                                {{-- Tombol Lihat Detail dihapus --}}
                                {{-- <a href="{{ route('kelas.show', $k->id) }}" 
                                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                   title="Lihat Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a> --}}
                                <a href="{{ route('kelas.edit', $k->id) }}" 
                                   class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                   title="Edit Kelas">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" onsubmit="return confirmDelete('{{ $k->kode_kelas }}')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                            title="Hapus Kelas">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr id="emptyState">
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">Tidak ada data kelas</p>
                                    <p class="text-gray-400 text-sm">Mulai dengan menambahkan kelas baru</p>
                                </div>
                                <a href="{{ route('kelas.create') }}" 
                                   class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                    Tambah Kelas
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Search and filter functionality
function filterTable() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const ruanganFilter = document.getElementById('ruanganFilter').value.toLowerCase();
    const mataKuliahFilter = document.getElementById('mataKuliahFilter').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr:not(#emptyState)');
    let visibleCount = 0;

    rows.forEach(row => {
        const kode = row.dataset.kode || '';
        const ruangan = row.dataset.ruangan || '';
        const mataKuliah = row.dataset.mataKuliah || '';

        const matchesSearch = kode.includes(searchTerm) || ruangan.includes(searchTerm) || mataKuliah.includes(searchTerm);
        const matchesRuangan = !ruanganFilter || ruangan.includes(ruanganFilter);
        const matchesMataKuliah = !mataKuliahFilter || mataKuliah.includes(mataKuliahFilter);

        if (matchesSearch && matchesRuangan && matchesMataKuliah) {
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
document.getElementById('ruanganFilter').addEventListener('change', filterTable);
document.getElementById('mataKuliahFilter').addEventListener('change', filterTable);

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('ruanganFilter').value = '';
    document.getElementById('mataKuliahFilter').value = '';
    filterTable();
}

// Export functionality
function exportData() {
    const rows = document.querySelectorAll('#tableBody tr:not(#emptyState)');
    let csv = 'No,Kode Kelas,Ruangan,Mata Kuliah,Dosen Pengampu,Kapasitas\n';
    
    rows.forEach((row, index) => {
        if (row.style.display !== 'none') {
            const cells = row.querySelectorAll('td');
            const rowData = [
                index + 1,
                cells[1].textContent.trim(),
                cells[2].querySelector('.text-sm.font-medium').textContent.trim(),
                cells[3].querySelector('.text-sm.font-medium').textContent.trim(),
                cells[4].textContent.trim(),
                cells[5].textContent.trim()
            ];
            csv += rowData.map(cell => `"${cell}"`).join(',') + '\n';
        }
    });
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'data-kelas.csv';
    a.click();
    window.URL.revokeObjectURL(url);
}

// Confirm delete
function confirmDelete(kodeKelas) {
    return confirm(`Yakin ingin menghapus kelas "${kodeKelas}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait.`);
}

// Auto-focus search on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').focus();
});
</script>
@endsection