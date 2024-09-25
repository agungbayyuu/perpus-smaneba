@extends('dashboard')

@section('sidebar')
<div class="col-sm-3 sidenav hidden-xs" style="height: 100vh" id="sidebar">
  <img src="perpus-removebg.png" alt="" class="sidebar-img">
  <ul class="nav nav-pills nav-stacked" style="padding-top: 20px">
    <li class="active" ><a href="/dashboard">Daftar Hadir</a></li>
    <li><a href="/dashboard/ranking">Pengunjung Terbanyak</a></li>
    <li><a href="/buku">Buku</a></li>
    <li><a href="/actionlogout">Logout</a></li>
  </ul><br>
</div>
@endsection

@section('konten')
<div class="col-sm-9">
  <div class="well">
    <h4>Daftar Hadir</h4>
    <table class="table">
      <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tujuan</th>
            <th>Tanggal Daftar Hadir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->nama_siswa }}</td>
            <td>{{ $d->nama_kelas }}</td>
            <td>{{ $d->tujuan }}</td>
            <td>{{ $d->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
  </div>
</div>
@endsection
