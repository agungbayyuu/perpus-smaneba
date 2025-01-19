<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function tampil_peminjaman(){
        $data = DB::table('peminjaman')
        ->join('siswa', 'siswa.id_siswa', '=', 'peminjaman.id_siswa')
        ->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')
        ->select('peminjaman.id_peminjaman','siswa.nama_siswa', 'buku.judul', 'peminjaman.tanggal_pinjam','peminjaman.tanggal_kembali','peminjaman.status')
        ->orderByDesc('id_peminjaman')
        ->paginate(10);

        // return response()->json($data);
        // Kirim data ke view
        return view('peminjaman', ['data' => $data]);
    }
    
    public function tampil_buku(){
        $data = DB::table('buku')->select('id_buku')->get();
        return response()->json($data);
    }

    public function tampil_siswa(){
        $data = DB::table('siswa')->get();
        return view('siswa', ['data' => $data]);
    }

    public function tampil_siswa_json(){
        $data = DB::table('siswa')->get();
        return response()->json($data);
    }

    public function tambah_peminjaman(Request $request){
        $data = DB::table('peminjaman')->insert($request->all());
        return redirect()->route('peminjaman');
    }


}
