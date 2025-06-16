<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    protected $table = 'krs'; 
    protected $fillable = ['mahasiswa_id', 'jadwal_id', 'tahun_ajaran', 'semester'];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class);
    }

    public function khs() {
        return $this->hasOne(KHS::class, 'krs_id');
    }

    public function absensi() {
        return $this->hasMany(Absensi::class, 'krs_id');
    }
}

