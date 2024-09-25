<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BukuController extends Controller
{
    public function api_tampil_buku() {
        $buku = Buku::all();
        return response()->json($buku);
    }
    public function view_tampil_buku(){
        $data = Buku::all();

        // Kirim data ke view
        return view('buku', ['data' => $data]);
        // return view('buku');
    }
}
