@extends('dashboard')

@section('sidebar')
<div class="col-sm-3 sidenav hidden-xs" style="height: 100vh">
  <b><h3>Perpustakaan SMANEBA</h3></b>
  <ul class="nav nav-pills nav-stacked" style="padding-top: 20px">
    <li class="active"><a href="/dashboard">Daftar Hadir</a></li>
    <li><a href="/dashboard/ranking">Pengunjung Terbanyak</a></li>
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
            <th>Tanggal Daftar Hadir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->nama_siswa }}</td>
            <td>{{ $d->nama_kelas }}</td>
            <td>{{ $d->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $data->links() }}
  </div>
</div>
@endsection
