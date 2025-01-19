@extends('dashboard')

@section('sidebar')
<div class="col-sm-3 sidenav hidden-xs" style="height: 100vh" id="sidebar">
  <img src="perpus-removebg.png" alt="" class="sidebar-img">
  <ul class="nav nav-pills nav-stacked" style="padding-top: 20px">
    <li><a href="/dashboard">Daftar Hadir</a></li>
    <li><a href="/dashboard/ranking">Pengunjung Terbanyak</a></li>
    <li><a href="/buku">Buku</a></li>
    <li  class="active" ><a href="/peminjaman">Peminjaman</a></li>
    <li><a href="/actionlogout">Logout</a></li>
  </ul><br>
</div>
@endsection

@section('konten')
<div class="col-sm-9">
  <button class="btn btn-primary" type="submit" onclick="openForm()">Tambah buku</button>
  <div class="well">
    <h4>Daftar Hadir</h4>
    <table class="table">
      <thead>
        <tr>
            <th>ID Peminjaman</th>
            <th>Nama Siswa</th>
            <th>Nama Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->id_peminjaman }}</td>
            <td>{{ $d->nama_siswa }}</td>
            <td>{{ $d->judul }}</td>
            <td>{{ $d->tanggal_pinjam }}</td>
            <td>{{ $d->tanggal_kembali }}</td>
            <td>{{ $d->status }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
  </div>
</div>

<!-- Modal Tambah-->
<form action="/buku/tambah" method="POST" class="modal" tabindex="-3" role="dialog" id="modal" style="height: 600px">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal_title">Peminjaman</h5>
            <button onclick="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
                <div class="mb-3">
                  <label  class="form-label">Nama Siswa</label>
                  <input type="text" class="form-control" id="judul" name="judul" aria-describedby="emailHelp" placeholder="judul">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Nama Buku</label>
                  <input type="text" class="form-control" id="pengarang" name="pengarang" aria-describedby="emailHelp" placeholder="pengarang">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" aria-describedby="emailHelp" placeholder="penerbit">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Tahun Terbit</label>
                  <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" aria-describedby="emailHelp" placeholder="tahun_terbit">
                </div>
                @csrf
                @method('post')
                <button type="submit" onclick="" class="btn btn-primary" style="margin-top: 15px" id="submit_buku">Submit</button>
          </div>
        </div>
  </div>
</form>
<!-- Modal -->

<script>
  function openForm() {
  document.getElementById("modal").style.display = "block";
  }
</script>

@endsection
