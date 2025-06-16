@extends('layouts.app')

@section('page-title', 'Tambah Mata Kuliah')
@section('page-description', 'Tambahkan data mata kuliah baru ke sistem')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Breadcrumb -->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm text-gray-500">
            <li>
                <a href="{{ route('matakuliah.index') }}" class="hover:text-gray-700">Data Mata Kuliah</a>
            </li>
            <li>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class="text-gray-900 font-medium">Tambah Mata Kuliah</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Tambah Mata Kuliah Baru</h2>
                <p class="text-gray-600">Lengkapi form di bawah untuk menambahkan mata kuliah ke sistem</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <form action="{{ route('matakuliah.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Course Information Section -->
            <div class="border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Informasi Mata Kuliah
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kode Mata Kuliah -->
                    <div>
                        <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Kode Mata Kuliah
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <input type="text" 
                               id="kode" 
                               name="kode" 
                               placeholder="Contoh: TIF101, MAT201"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('kode') border-red-500 @enderror"
                               value="{{ old('kode') }}"
                               required>
                        @error('kode')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Nama Mata Kuliah -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Nama Mata Kuliah
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <input type="text" 
                               id="nama" 
                               name="nama" 
                               placeholder="Contoh: Algoritma dan Pemrograman"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('nama') border-red-500 @enderror"
                               value="{{ old('nama') }}"
                               required>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Jumlah SKS -->
                    <div>
                        <label for="sks" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Jumlah SKS
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <select id="sks" 
                                name="sks" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('sks') border-red-500 @enderror"
                                required>
                            <option value="">Pilih Jumlah SKS</option>
                            <option value="1" {{ old('sks') == '1' ? 'selected' : '' }}>1 SKS</option>
                            <option value="2" {{ old('sks') == '2' ? 'selected' : '' }}>2 SKS</option>
                            <option value="3" {{ old('sks') == '3' ? 'selected' : '' }}>3 SKS</option>
                            <option value="4" {{ old('sks') == '4' ? 'selected' : '' }}>4 SKS</option>
                            <option value="5" {{ old('sks') == '5' ? 'selected' : '' }}>5 SKS</option>
                            <option value="6" {{ old('sks') == '6' ? 'selected' : '' }}>6 SKS</option>
                        </select>
                        @error('sks')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Semester -->
                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Semester
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <select id="semester" 
                                name="semester" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('semester') border-red-500 @enderror"
                                required>
                            <option value="">Pilih Semester</option>
                            <option value="ganjil" {{ old('semester') == 'ganjil' ? 'selected' : '' }}>Semester Ganjil</option>
                            <option value="genap" {{ old('semester') == 'genap' ? 'selected' : '' }}>Semester Genap</option>
                        </select>
                        @error('semester')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Lecturer Assignment Section -->
            <div class="border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Dosen Pengampu
                </h3>
                
                <div class="space-y-4">
                    @for($i = 1; $i <= 3; $i++)
                    <div>
                        <label for="dosen_pengampu_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Dosen Pengampu {{ $i }}
                                @if($i == 1)
                                    <span class="text-red-500">*</span>
                                    <span class="text-xs text-gray-500">(Wajib)</span>
                                @else
                                    <span class="text-xs text-gray-500">(Opsional)</span>
                                @endif
                            </div>
                        </label>
                        <select id="dosen_pengampu_{{ $i }}" 
                                name="dosen_pengampu_{{ $i }}" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error("dosen_pengampu_$i") border-red-500 @enderror"
                                {{ $i == 1 ? 'required' : '' }}>
                            <option value="">Pilih Dosen</option>
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->nama }}" 
                                        {{ old("dosen_pengampu_$i") == $dosen->nama ? 'selected' : '' }}>
                                    {{ $dosen->nama }} - {{ $dosen->bidang_keahlian }}
                                </option>
                            @endforeach
                        </select>
                        @error("dosen_pengampu_$i")
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Information Box -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m-1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-blue-900 mb-1">Informasi Penting</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Kode mata kuliah harus unik dan mengikuti standar institusi</li>
                            <li>• Minimal harus ada 1 dosen pengampu untuk setiap mata kuliah</li>
                            <li>• Jumlah SKS menentukan beban kerja dan durasi perkuliahan</li>
                            <li>• Semester menentukan kapan mata kuliah akan ditawarkan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('matakuliah.index') }}" 
                   class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Mata Kuliah
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function clearForm() {
    if (confirm('Yakin ingin mengosongkan semua field?')) {
        document.getElementById('kode').value = '';
        document.getElementById('nama').value = '';
        document.getElementById('sks').value = '';
        document.getElementById('semester').value = '';
        document.getElementById('dosen_pengampu_1').value = '';
        document.getElementById('dosen_pengampu_2').value = '';
        document.getElementById('dosen_pengampu_3').value = '';
        document.getElementById('kode').focus();
    }
}

// Auto-focus on first input when page loads
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('kode').focus();
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = ['kode', 'nama', 'sks', 'semester', 'dosen_pengampu_1'];
    let hasError = false;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            hasError = true;
        }
    });
    
    if (hasError) {
        e.preventDefault();
        alert('Mohon lengkapi semua field yang wajib diisi');
        return false;
    }
    
    // Check for duplicate lecturers
    const dosen1 = document.getElementById('dosen_pengampu_1').value;
    const dosen2 = document.getElementById('dosen_pengampu_2').value;
    const dosen3 = document.getElementById('dosen_pengampu_3').value;
    
    if (dosen1 && dosen2 && dosen1 === dosen2) {
        e.preventDefault();
        alert('Dosen pengampu tidak boleh sama');
        return false;
    }
    
    if (dosen1 && dosen3 && dosen1 === dosen3) {
        e.preventDefault();
        alert('Dosen pengampu tidak boleh sama');
        return false;
    }
    
    if (dosen2 && dosen3 && dosen2 === dosen3) {
        e.preventDefault();
        alert('Dosen pengampu tidak boleh sama');
        return false;
    }
});

// Auto-generate course code suggestion
document.getElementById('nama').addEventListener('input', function() {
    const nama = this.value;
    const kodeField = document.getElementById('kode');
    
    if (!kodeField.value && nama.length > 3) {
        // Simple auto-suggestion logic
        const words = nama.split(' ');
        let suggestion = '';
        
        words.forEach(word => {
            if (word.length > 2) {
                suggestion += word.substring(0, 3).toUpperCase();
            }
        });
        
        if (suggestion.length > 6) {
            suggestion = suggestion.substring(0, 6);
        }
        
        // Add number suffix
        suggestion += '101';
        
        // Show suggestion (you can implement a tooltip or placeholder update)
        kodeField.placeholder = `Saran: ${suggestion}`;
    }
});
</script>
@endsection