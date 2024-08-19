<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    protected $table = 'daftarhadir'; // Replace with your table name
    protected $fillable = ['id_daftarhadir']; // Replace with your columns
    public $timestaps = false;

    public function daftarhadir()
    {
        return $this->hasMany(SiswaModel::class);
    }
}
