<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Pengunjung()
    {
        $daftarHadir = DB::table('daftarhadir')
            ->join('siswa', 'siswa.id_siswa', '=', 'daftarhadir.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->select('siswa.nama_siswa', 'kelas.nama_kelas', 'daftarhadir.tujuan','daftarhadir.created_at')
            ->orderByDesc('id_daftarhadir')
            ->paginate(8);
        return view ('pengunjung', ['data'=>$daftarHadir]);
    }
    public function PengunjungTerbanyak(Request $request)
    {
        $tanggalMulai = $request->tanggal_mulai;
        $tanggalAkhir = $request->tanggal_akhir;

        $siswaTerbanyak = DB::table('daftarhadir')
            ->join('siswa', 'siswa.id_siswa', '=', 'daftarhadir.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->select('siswa.nama_siswa', 'kelas.nama_kelas', DB::raw('count(*) as total_kehadiran'))
            ->whereBetween('daftarhadir.created_at', [$tanggalMulai, $tanggalAkhir])
            ->groupBy('daftarhadir.id_siswa', 'siswa.nama_siswa', 'kelas.nama_kelas')
            ->orderBy('total_kehadiran', 'desc')
            ->get();

        return view('konten', ['data'=>$siswaTerbanyak]);
    }
    public function ViewPengunjungTerbanyak()
    {
        $siswaTerbanyak = DB::table('daftarhadir')
        ->join('siswa', 'siswa.id_siswa', '=', 'daftarhadir.id_siswa')
        ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
        ->select('siswa.nama_siswa', 'kelas.nama_kelas', DB::raw('count(*) as total_kehadiran'))
        ->groupBy('daftarhadir.id_siswa', 'siswa.nama_siswa', 'kelas.nama_kelas')
        ->orderBy('total_kehadiran', 'desc')
        ->get();
        return view('konten', ['data'=>$siswaTerbanyak]);
    }
}

