<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi'; 
    protected $fillable = ['nama', 'fakultas'];

    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class);
    }
}
