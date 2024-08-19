<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa'; // Replace with your table name
    protected $primarykey = ['id_siswa']; // Replace with your columns
    public $incrementing = false;
    public $timestamps = false;

    public function daftarHadir()
    {
        return $this->hasMany(DaftarHadir::class);
    }

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class);
    }
}
