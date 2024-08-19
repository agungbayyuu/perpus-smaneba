<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\KelasModel;
use App\Models\SiswaModel;
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

        // Buat data kehadiran baru
        $kehadiran = new DaftarHadir();
        $kehadiran->id_siswa = $request->id_siswa;
        $kehadiran->tujuan = $request->tujuan;
        // Simpan data ke database
        $kehadiran->save();

        // Redirect atau berikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Data kehadiran berhasil ditambahkan');
        return route('/Absen');
    }
}
