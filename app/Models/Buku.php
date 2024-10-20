<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku'; // Replace with your table name
    protected $primaryKey = 'id_buku'; // Replace with your columns
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit'];
    public $timestaps = false;
}
