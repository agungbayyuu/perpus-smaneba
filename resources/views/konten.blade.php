@extends('dashboard')

@section('sidebar')
<div class="col-sm-3 sidenav hidden-xs" style="height: 100vh">
  <img src="../perpus-removebg.png" alt="" class="sidebar-img">
  <ul class="nav nav-pills nav-stacked" style="padding-top: 20px">
    <li><a href="/dashboard">Daftar Hadir</a></li>
    <li class="active"><a href="/dashboard/ranking/">Pengunjung Terbanyak</a></li>
    <li><a href="/buku">Buku</a></li>
    <li><a href="/peminjaman">Peminjaman</a></li>
    <li><a href="/actionlogout">Logout</a></li>
  </ul><br>
</div>
@endsection

@section('konten')

<div class="col-sm-9">
  <form action="#" method="POST" id="myForm">
    @csrf
    <label for="tanggal_mulai">Tanggal Mulai:</label>
    <input type="date" name="tanggal_mulai" id="tanggal_mulai">
    <label for="tanggal_akhir">Tanggal Akhir:</label>
    <input type="date" name="tanggal_akhir" id="tanggal_akhir">
    <button type="button" onclick="submitForm('cari')">Cari</button>
    <button type="button" onclick="submitForm('cetak')">Cetak</button>
  </form>
  <script>
      function submitForm(action) {
          let form = document.getElementById('myForm');
          if (action === 'cari') {
              // document.getElementById('saved_tanggal_mulai').value = document.getElementById('tanggal_mulai').value;
              // document.getElementById('saved_tanggal_akhir').value = document.getElementById('tanggal_akhir').value;
              form.action = "{{ route('siswaterbanyak') }}";
          } else if (action === 'cetak') {
              form.action = "{{ route('CetakPengunjung') }}";
          } else {
              // Handle kasus jika action tidak valid
              console.error('Aksi tidak valid');
              return;
          }
          form.submit();
      }
    </script>

  <div class="well" style="margin-top: 30px">
    <h4>Pengunjung Terbanyak</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Total Berkunjung</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $d)
            <tr>
                <td>{{ $d->nama_siswa }}</td>
                <td>{{ $d->nama_kelas }}</td>
                <td>{{ $d->total_kehadiran }}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection

