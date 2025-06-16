<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; 
    protected $fillable = ['user_id', 'nim', 'nama', 'angkatan', 'prodi_id'];

    public function prodi() {
        return $this->belongsTo(Prodi::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function krs() {
        return $this->hasMany(KRS::class);
    }
    
}