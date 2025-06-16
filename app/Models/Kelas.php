<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas'; 
    protected $fillable = ['kode_kelas', 'ruangan', 'mata_kuliah_id'];

    public function mata_kuliah() {
        return $this->belongsTo(MataKuliah::class);
    }

    public function jadwal() {
        return $this->hasOne(Jadwal::class);
    }

    public function krs() {
        return $this->hasMany(KRS::class);
    }
}
