@extends('layouts.app')

@section('page-title', 'Data Mata Kuliah')
@section('page-description', 'Kelola data mata kuliah sistem informasi akademik')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Data Mata Kuliah</h2>
                <p class="text-gray-600">Kelola informasi mata kuliah dalam sistem akademik</p>
            </div>
            <a href="{{ route('matakuliah.create') }}" 
               class="bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded-lg text-white font-medium shadow-sm flex items-center gap-2 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Mata Kuliah
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Mata Kuliah</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah->count() }}</p>
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
                    <p class="text-gray-600 text-sm font-medium">Semester Ganjil</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah->where('semester', 'ganjil')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Semester Genap</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah->where('semester', 'genap')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total SKS</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $mata_kuliah->sum('sks') }}</p>
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
                           placeholder="Cari mata kuliah berdasarkan kode atau nama..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                </div>
            </div>
            <div class="flex gap-3">
                <select id="semesterFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                    <option value="">Semua Semester</option>
                    <option value="ganjil">Semester Ganjil</option>
                    <option value="genap">Semester Genap</option>
                </select>
                <select id="sksFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200">
                    <option value="">Semua SKS</option>
                    <option value="1">1 SKS</option>
                    <option value="2">2 SKS</option>
                    <option value="3">3 SKS</option>
                    <option value="4">4 SKS</option>
                    <option value="5">5 SKS</option>
                    <option value="6">6 SKS</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Mata Kuliah</h3>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Total: </span>
                    <span id="totalCount" class="text-sm font-medium text-indigo-600">{{ $mata_kuliah->count() }}</span>
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen Pengampu</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                    @forelse ($mata_kuliah as $mk)
                    <tr class="hover:bg-gray-50 transition-colors duration-200" 
                        data-kode="{{ strtolower($mk->kode) }}" 
                        data-nama="{{ strtolower($mk->nama) }}" 
                        data-semester="{{ $mk->semester }}" 
                        data-sks="{{ $mk->sks }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="text-indigo-600 font-medium text-sm">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $mk->kode }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($mk->nama, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $mk->nama }}</div>
                                    <div class="text-sm text-gray-500">Mata Kuliah</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                {{ $mk->sks }} SKS
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                {{ $mk->semester == 'ganjil' ? 'bg-purple-100 text-purple-800' : 'bg-pink-100 text-pink-800' }}">
                                {{ ucfirst($mk->semester) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs">
                                <p class="truncate">{{ $mk->dosen_pengampu }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('matakuliah.show', $mk->id) }}" 
                                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                   title="Lihat Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('matakuliah.edit', $mk->id) }}" 
                                   class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                   title="Edit Mata Kuliah">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" onsubmit="return confirmDelete('{{ $mk->nama }}')" class="inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition-colors duration-200"
                                            title="Hapus Mata Kuliah">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">Tidak ada data mata kuliah</p>
                                    <p class="text-gray-400 text-sm">Mulai dengan menambahkan mata kuliah baru</p>
                                </div>
                                <a href="{{ route('matakuliah.create') }}" 
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
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

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('matakuliah.create') }}" 
               class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Tambah Mata Kuliah</p>
                    <p class="text-sm text-gray-600">Buat mata kuliah baru</p>
                </div>
            </a>
            
            <button onclick="exportData()" 
                    class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Export Data</p>
                    <p class="text-sm text-gray-600">Download data mata kuliah</p>
                </div>
            </button>
            
            <button onclick="clearFilters()" 
                    class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Reset Filter</p>
                    <p class="text-sm text-gray-600">Hapus semua filter</p>
                </div>
            </button>
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
        const kode = row.dataset.kode || '';
        const nama = row.dataset.nama || '';
        const semester = row.dataset.semester || '';
        const sks = row.dataset.sks || '';

        const matchesSearch = kode.includes(searchTerm) || nama.includes(searchTerm);
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

// Clear filters
function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('semesterFilter').value = '';
    document.getElementById('sksFilter').value = '';
    filterTable();
}

// Export functionality
function exportData() {
    // Simple CSV export
    const rows = document.querySelectorAll('#tableBody tr:not(#emptyState)');
    let csv = 'No,Kode,Nama Mata Kuliah,SKS,Semester,Dosen Pengampu\n';
    
    rows.forEach((row, index) => {
        if (row.style.display !== 'none') {
            const cells = row.querySelectorAll('td');
            const rowData = [
                index + 1,
                cells[1].textContent.trim(),
                cells[2].querySelector('.text-sm.font-medium').textContent.trim(),
                cells[3].textContent.trim(),
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
    a.download = 'data-mata-kuliah.csv';
    a.click();
    window.URL.revokeObjectURL(url);
}

// Confirm delete
function confirmDelete(nama) {
    return confirm(`Yakin ingin menghapus mata kuliah "${nama}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait.`);
}

// Auto-focus search on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').focus();
});
</script>
@endsection