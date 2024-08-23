<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\SiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $tanggalMulai = $request->input('tanggal_mulai', null);
        $tanggalAkhir = $request->input('tanggal_akhir', null);

        $validatedData = $request->validate([
            'tanggal_mulai' => 'date|nullable',
            'tanggal_akhir' => 'date|nullable|after:tanggal_mulai'
        ]);
    
        $query = DB::table('daftarhadir')
            ->join('siswa', 'siswa.id_siswa', '=', 'daftarhadir.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->select('siswa.nama_siswa', 'kelas.nama_kelas', DB::raw('count(*) as total_kehadiran'))
            ->groupBy('daftarhadir.id_siswa', 'siswa.nama_siswa', 'kelas.nama_kelas')
            ->orderBy('total_kehadiran', 'desc');
    
        // Tambahkan kondisi where jika tanggal diberikan
        if ($tanggalMulai && $tanggalAkhir) {
            $query->whereBetween('daftarhadir.created_at', [$tanggalMulai, $tanggalAkhir]);
        }
    
        $data = $query->paginate(8);
    
        return view('konten', ['data' => $data]);
    }

    public function CetakPengunjungTerbanyak(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai', null);
        $tanggalAkhir = $request->input('tanggal_akhir', null);

        $validatedData = $request->validate([
            'tanggal_mulai' => 'date|nullable',
            'tanggal_akhir' => 'date|nullable|after:tanggal_mulai'
        ]);
    
        $query = DB::table('daftarhadir')
            ->join('siswa', 'siswa.id_siswa', '=', 'daftarhadir.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->select('siswa.nama_siswa', 'kelas.nama_kelas', DB::raw('count(*) as total_kehadiran'))
            ->groupBy('daftarhadir.id_siswa', 'siswa.nama_siswa', 'kelas.nama_kelas')
            ->orderBy('total_kehadiran', 'desc');

        if ($tanggalMulai && $tanggalAkhir) {
            $query->whereBetween('daftarhadir.created_at', [$tanggalMulai, $tanggalAkhir]);
        }
    
        $data = $query->get();
    
        // Customisasi PDF (bisa ditambahkan opsi lain)
        $pdf = Pdf::loadView('konten_pdf', ['data' => $data])
            ->setPaper('a4', 'potrait') // Sesuaikan ukuran dan orientasi
            ->setOption(['margin_top' => 10, 'margin_bottom' => 10]);
    
        return $pdf->stream();
    }
}
