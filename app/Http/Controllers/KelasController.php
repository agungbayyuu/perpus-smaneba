<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Request;

class KelasController extends Controller
{
    public function tampilkelas()
    {
        $data = KelasModel::all();
        return view ('home', ['data'=>$data]);
    }
    public function tampilnama(FacadesRequest $request, $id_kelas)
    {
        $siswa = SiswaModel::where('id_kelas', $id_kelas)->get();
        return response()->json($siswa);
    }
    public function kehadiran(HttpRequest $request)
    {
        // Validasi input
        $request->validate([
            'id_siswa' => 'required',
            'tujuan' => 'required',
        ],[
            'required' => 'Nama siswa dan tujuan wajib diisi',
        ]);

        // Cek apakah siswa sudah absen hari ini
        $today = Carbon::today();
        $existingAbsen = DaftarHadir::where('id_siswa', $request->id_siswa)
                                ->whereDate('created_at', $today)
                                ->first();

        if ($existingAbsen) {
            return response()->json([
                'success' => false,
                'message' => 'Siswa sudah melakukan absen hari ini.'
            ],422);    
        }
        // Buat data kehadiran baru
        $kehadiran = new DaftarHadir();
        $kehadiran->id_siswa = $request->id_siswa;
        $kehadiran->tujuan = $request->tujuan;
        // Simpan data ke database
        $kehadiran->save();

        // Redirect atau berikan response sesuai kebutuhan
        return response()->json([
            'success' => true,
            'message' => 'Absensi Berhasil'
        ],200);
        return route('/Absen');
    }
}
