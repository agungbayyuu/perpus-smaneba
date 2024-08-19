<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    protected $table = 'kelas'; // Replace with your table name
    protected $fillable = ['nama_kelas']; // Replace with your columns

    public function kelas()
    {
        return $this->belongsTo(DaftarHadir::class);
    }
}
