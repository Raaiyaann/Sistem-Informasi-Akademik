<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $kelas = Kelas::with('mata_kuliah')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $mata_kuliah = MataKuliah::all();
        return view('admin.kelas.create', compact('mata_kuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'kode_kelas' => 'required|unique:kelas,kode_kelas',
            'ruangan' => 'required',
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
        ]);

        $mata_kuliah = MataKuliah::find($validated['mata_kuliah_id']);
        
        if (!$mata_kuliah || !$mata_kuliah->dosen_pengampu) {
                return back()->withErrors(['mata_kuliah_id' => 'Mata kuliah ini belum memiliki dosen pengampu.']);
        }
        Kelas::create([
            'kode_kelas' => $validated['kode_kelas'],
            'ruangan' => $validated['ruangan'],
            'mata_kuliah_id' => $validated['mata_kuliah_id'],
        ]); 

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Kelas::with('mataKuliah')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $kelas = Kelas::findOrFail($id);
        $mata_kuliah = MataKuliah::all();
        return view('admin.kelas.edit', compact('kelas', 'mata_kuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}
