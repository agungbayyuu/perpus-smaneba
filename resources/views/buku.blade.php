@extends('dashboard')

@section('sidebar')
<div class="col-sm-3 sidenav hidden-xs" style="height: 100vh">
  <img src="../perpus-removebg.png" alt="" class="sidebar-img">
  <ul class="nav nav-pills nav-stacked" style="padding-top: 20px">
    <li><a href="/dashboard">Daftar Hadir</a></li>
    <li><a href="/dashboard/ranking/">Pengunjung Terbanyak</a></li>
    <li class="active"><a href="/buku">Buku</a></li>
    <li><a href="/actionlogout">Logout</a></li>
  </ul><br>
</div>
@endsection

@section('konten')

<div class="col-sm-9">
  <div class="well" style="margin-top: 30px">
    <h4>Buku</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun Terbit</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $d)
            <tr>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->pengarang }}</td>
                <td>{{ $d->penerbit }}</td>
                <td>{{ $d->tahun_terbit }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

