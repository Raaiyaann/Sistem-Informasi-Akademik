<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal'; 
    protected $fillable = ['kelas_id', 'mata_kuliah_id', 'dosen_id', 'hari', 'jam_mulai', 'jam_selesai', 'ruangan'];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
    public function mataKuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
    public function dosen() {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function krs() {
        return $this->hasMany(KRS::class);
    }
}

