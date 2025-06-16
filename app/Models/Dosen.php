<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen'; 
    protected $fillable = ['user_id', 'nip', 'nama', 'bidang_keahlian'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mataKuliah() {
        return $this->belongsToMany(MataKuliah::class);
    }
}
