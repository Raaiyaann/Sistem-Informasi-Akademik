<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $prodi = Prodi::all();
        return view('admin.prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('admin.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255|unique:prodi,nama',
            'fakultas' => 'required|string|max:255',
        ], [
            'nama.unique' => 'Prodi tersebut sudah ada, mohon tambahkan prodi yang baru.'
        ]);

        Prodi::create($request->all());
        $prodi = Prodi::all();
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return Prodi::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $prodi = Prodi::findOrFail($id);
        return view('admin.prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255|unique:prodi,nama,' . $id,
            'fakultas' => 'required|string|max:255',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update($request->all());
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}
