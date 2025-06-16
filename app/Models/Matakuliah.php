<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah'; 
    protected $fillable = ['kode', 'nama', 'sks', 'semester', 'dosen_pengampu'];
    public function dosens() {
        return $this->hasMany(Dosen::class, 'mata_kuliah_id');
    }
    public function krs() {
        return $this->hasMany(KRS::class);
    }

    public function kelas() {
        return $this->hasMany(Kelas::class);
    }
}
