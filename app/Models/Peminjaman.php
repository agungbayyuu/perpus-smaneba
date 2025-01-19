<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman'; // Replace with your table name
    protected $primaryKey = 'id_peminjaman'; // Replace with your columns
    protected $fillable = ['id_siswa','id_buku','tanggal_pinjam', 'tanggal_kembali', 'status'];
}
