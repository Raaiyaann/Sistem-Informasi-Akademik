@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-white text-gray-800 p-6 rounded-r-xl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Data KRS</h2>
        <a href="{{ route('krs.create') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md text-white font-semibold shadow transition-all">
            + Tambah KRS
        </a>
    </div>

    <div class="overflow-auto rounded-lg shadow border border-gray-200">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 border-b text-left">No</th>
                    <th class="px-4 py-3 border-b text-left">Mahasiswa</th>
                    <th class="px-4 py-3 border-b text-left">Mata Kuliah</th>
                    <th class="px-4 py-3 border-b text-left">Kelas</th>
                    <th class="px-4 py-3 border-b text-left">Tahun Ajaran</th>
                    <th class="px-4 py-3 border-b text-left">Semester</th>
                    <th class="px-4 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($krs as $item)
                <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                    <td class="px-4 py-3 border-b text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->mahasiswa->nama ?? '-' }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->jadwal->kelas->mata_kuliah->nama ?? '-' }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->jadwal->kelas->kode_kelas ?? '-' }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->tahun_ajaran }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->jadwal->kelas->mata_kuliah->semester }}</td>
                    <td class="px-4 py-3 border-b text-center">
                        <form action="{{ route('krs.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition-all">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($krs->isEmpty())
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">Belum ada data KRS.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection