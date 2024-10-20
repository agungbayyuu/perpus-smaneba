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
  <button class="btn btn-primary" type="submit" onclick="openForm()">Tambah buku</button>
  <div class="well" style="margin-top: 15px">
    <h4>Buku</h4>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id Buku</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun Terbit</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $d)
            <tr>
                <td>{{ $d->id_buku }}</td>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->pengarang }}</td>
                <td>{{ $d->penerbit }}</td>
                <td>{{ $d->tahun_terbit }}</td>
                <td>
                  <form action="/buku/delete/{{$d->id_buku}}" method="POST">
                    @csrf
                    
                    @method('delete')
                    
                    <input class="btn btn-primary" type="submit" value="Delete">
                  </form>

                    <button class="btn btn-primary" onclick="editForm({{$d->id_buku}})">Edit</button>
                    <!-- Modal Update-->
   <form action="/buku/update/{{$d->id_buku}}" method="POST" class="modal" tabindex="-3" role="dialog" id="modal_update" style="height: 600px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modal_title"></h5>
              <button onclick="closeFormUpdate()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <div class="modal-body">
                  <div class="mb-3">
                    {{-- <label  class="form-label">Nama Buku</label> --}}
                    <input type="text" class="form-control" id="id_edit" name="judul_edit" aria-describedby="emailHelp" placeholder="judul">
                    <input type="text" class="form-control" id="judul_edit" name="judul_edit" aria-describedby="emailHelp" placeholder="judul">
                  </div>
                  <div class="mb-3">
                    {{-- <label  class="form-label">Pengarang</label> --}}
                    <input type="text" class="form-control" id="pengarang_edit" name="pengarang_edit" aria-describedby="emailHelp" placeholder="pengarang">
                  </div>
                  <div class="mb-3">
                    {{-- <label  class="form-label">Penerbit</label> --}}
                    <input type="text" class="form-control" id="penerbit_edit" name="penerbit_edit" aria-describedby="emailHelp" placeholder="penerbit">
                  </div>
                  <div class="mb-3">
                    {{-- <label  class="form-label">Tahun Terbit</label> --}}
                    <input type="text" class="form-control" id="tahun_terbit_edit" name="tahun_terbit_edit" aria-describedby="emailHelp" placeholder="tahun_terbit">
                  </div>
                  @csrf
                  @method('post')
                  <button type="submit" onclick="" class="btn btn-primary" style="margin-top: 15px" id="submit_buku">Submit</button>
            </div>
          </div>
    </div>  
  </form>
<!-- Modal -->

                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <!-- Modal Tambah-->
    <form action="/buku/tambah" method="POST" class="modal" tabindex="-3" role="dialog" id="modal" style="height: 600px">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Data Buku</h5>
                <button onclick="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                    <div class="mb-3">
                      <label  class="form-label">Nama Buku</label>
                      <input type="text" class="form-control" id="judul" name="judul" aria-describedby="emailHelp" placeholder="judul">
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Pengarang</label>
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

   
  </div>
</div>
<script>
  function editForm(id_buku){
    document.getElementById("modal_update").style.display = "block";
    $.ajax({
    url: 'api/buku/' + id_buku, // Sesuaikan dengan route Anda
    type: 'GET',
    success: function(data) {
      // Isi form dengan data buku
      $('#id_edit').val(id_buku);
      $('#judul_edit').val(data.judul);
      $('#pengarang_edit').val(data.pengarang);
      $('#penerbit_edit').val(data.penerbit);
      $('#tahun_terbit_edit').val(data.tahun_terbit);
      // Isi field lainnya sesuai dengan struktur data Anda
    }
  });
  }

  function openForm() {
  document.getElementById("modal").style.display = "block";

  }

  function closeForm() {
  document.getElementById("modal").style.display = "none";
  }
  function closeFormUpdate() {
  document.getElementById("modal_update").style.display = "none";
  }
  function closePopUp() {
    document.getElementById("response-pop-up").style.display = "none";
    document.getElementById("modal").style.display = "none";
    location.reload();

  }
</script>
@endsection

