<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function api_tampil_buku() {
        $buku = Buku::all();
        return response()->json($buku);
    }
    public function view_tampil_buku(){
        $data = DB::table('buku')
        ->orderByDesc('id_buku')
        ->paginate(10);

        // Kirim data ke view
        return view('buku', ['data' => $data]);
        // return view('buku');
    }
    public function api_tambah_buku(Request $request){
        $judul = request()->input('judul');
        $pengarang = request()->input('pengarang');
        $penerbit = request()->input('penerbit');
        $tahun_terbit = request()->input('tahun_terbit');

        try {
            $buku = new Buku();
            $buku->judul = $request->judul;
            $buku->pengarang = $request->pengarang;
            $buku->penerbit = $request->penerbit;
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil ditambahkan.'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data buku.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function tambah_buku(Request $request){
        $judul = $request->input('judul');
        $pengarang = $request->input('pengarang');
        $penerbit = $request->input('penerbit');
        $tahun_terbit = $request->input('tahun_terbit');

        try {
            $buku = new Buku();
            $buku->judul = $judul;
            $buku->pengarang = $pengarang;
            $buku->penerbit = $penerbit;
            $buku->tahun_terbit = $tahun_terbit;
            $buku->save();
            
            return redirect('/buku');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data buku.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function delete_buku($id){
        $post = DB::table('buku')->where('id_buku',$id);
        $post->delete();

        return redirect('/buku');
    }
    public function api_delete_buku($id){
        try {
            $post = DB::table('buku')->where('id_buku',$id);
            $post->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil dihapus.'
            ], 201);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus buku.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function api_update_buku(Request $request, $id){

    
        // Cari buku berdasarkan ID
        $buku = DB::table('buku')->where('id_buku',$id);
    
        // Update data buku
        $buku->update($request->all());
    
        return response()->json([
            'success' => true,
            'message' => 'Data buku berhasil diperbarui.'
        ], 200);
    }
    public function update_buku(Request $request,$id){
        $data1 = Buku::where('id_buku', $id)->first();
        if ($data1) {
            $data1->update([
                'judul' => $request->judul_edit,
                'pengarang' => $request->pengarang_edit,
                'penerbit' => $request->penerbit_edit,
                'tahun_terbit' => $request->tahun_terbit_edit,
            ]);
            return redirect('/buku');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus buku.',

            ], 500);
        }

        

    
        // Update data buku
        // $buku->update($request->all());
    

    }
    public function tampil_buku_byId($id){
    
        // Cari buku berdasarkan ID
        $buku = DB::table('buku')
        ->select('buku.judul', 'buku.pengarang', 'buku.penerbit', 'buku.tahun_terbit')
        ->where('id_buku', $id)
        ->orderBy('tahun_terbit', 'desc') // Mengurutkan berdasarkan tahun terbit secara descending
        ->first();
    
        // Update data buku
        // $buku->update($request->all());
    
        return response()->json($buku);
    }

}
