<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $mata_kuliah = MataKuliah::all();
        return view('admin.matakuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $dosens = Dosen::all();
        return view('admin.matakuliah.create', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
        'kode' => 'required|unique:mata_kuliah',
        'nama' => 'required',
        'sks' => 'required|integer',
        'semester' => 'required|in:ganjil,genap',
        'dosen_pengampu_1' => 'nullable|string',
        'dosen_pengampu_2' => 'nullable|string',
        'dosen_pengampu_3' => 'nullable|string',
    ]);

        // Gabungkan ketiga dosen menjadi satu string
        $dosenPengampu = collect([$request->dosen_pengampu_1, $request->dosen_pengampu_2, $request->dosen_pengampu_3])
            ->filter()
            ->implode(', ');

        $validated['dosen_pengampu'] = $dosenPengampu;

        MataKuliah::create($validated);

        return redirect()->route('matakuliah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return MataKuliah::with('dosens')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $matakuliah = MataKuliah::findOrFail($id);
        $dosens = Dosen::all();
        $dosen_pengampu = explode(', ', $matakuliah->dosen_pengampu);
        return view('admin.matakuliah.edit', compact('matakuliah', 'dosens', 'dosen_pengampu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $matkul = MataKuliah::findOrFail($id);

    $validated = $request->validate([
        'kode' => 'required|unique:mata_kuliah,kode,' . $id,
        'nama' => 'required',
        'sks' => 'required|integer',
        'semester' => 'required|in:ganjil,genap',
        'dosen_pengampu_1' => 'nullable|string',
        'dosen_pengampu_2' => 'nullable|string',
        'dosen_pengampu_3' => 'nullable|string',
    ]);

        // Gabungkan ketiga dosen menjadi satu string
        $dosenPengampu = collect([$request->dosen_pengampu_1, $request->dosen_pengampu_2, $request->dosen_pengampu_3])
            ->filter()
            ->implode(', ');

        $validated['dosen_pengampu'] = $dosenPengampu;

        $matkul->update($validated);

        return redirect()->route('matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $matkul = Matakuliah::findOrFail($id);
        $matkul->delete();
        return redirect()->route('matakuliah.index');
    }
}
