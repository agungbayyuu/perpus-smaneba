
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo-smaneba.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Meta Seo -->
    <title>Perpus SMAN 1 Bantur</title>
    <meta name="description" content="Perpustakaan elektronik indonesia, tempat membaca dan upgrade ilmu pengetahuan">
    <!-- akhir meta -->


</head>

<body>
    
    <main>
        <div class="container-landing">
            <div class="landing-kiri">
                <p>Mari baca buku dan tingkatkan ilmu</p>
                <h2>Selamat Datang di Perpustakaan SMAN 1 Bantur</h2>
                <p>Masukkan data untuk absensi pengunjung untuk mendapatkan hadiah yang menarik.</p>

                <div class="button-landing">
                    <button class="mulai-button" onclick="openForm()"><b>Absen Pengunjung</b></button>
                </div>

                <script>
                    function openForm() {
                    document.getElementById("modal").style.display = "block";
                    }
    
                    function closeForm() {
                    document.getElementById("modal").style.display = "none";
                    }

                    function closePopUp() {
                    document.getElementById("pop-up").style.display = "none";
                    }
                </script>
                
                <!-- Modal -->

                <form class="modal" tabindex="-3" role="dialog" id="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Absen Pengunjung</h5>
                            
                            <button onclick="closeForm()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            
                            </button>
                        </div>
                        
                        <div class="modal-body">
                            <div class="dropdown">
                                <h5>Kelas</h5>
                                <select class="btn btn-secondary dropdown-toggle" type="button" id="daftarkelas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-placeholder="Kelas">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h5>Nama Pengunjung</h5>
                                <select name="nama_siswa" class="btn btn-secondary dropdown-toggle" id="daftarsiswa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" width="100px">    
                                </select>
                        </div>
                        <div class="modal-footer">
                            <div class="button-modal">
                                <button class="start-button" action="{{}}"><b>Submit</b></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>

                <!-- Modal -->

                {{-- Pop Up --}}

                <div class="modal" id="pop-up" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Absensi Berhasil</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Selamat menikmati fasilitas perpustakaan.</p>
                          <p>Terimakasih</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" onclick="closePopUp()" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>



            </div>
            <div class="landing-kanan">
                <img src="logo-smaneba.png" alt="buku landing">
            </div>
        </div>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
</body>
<script>
    // function loadSiswa(kelasId)
    $(document).ready(function() {
        
        $('#daftarkelas').on('change', function(event) {
            var kelasId = $(this).val();
            console.log(kelasId)
            if (kelasId == "") return
            fetch('/api/nama/' + kelasId)
                .then((res) => res.json())
                .then((data) => {
                    console.log(data)
                    $('#daftarsiswa').html('');
                    data.map(function(siswa) {
                        console.log(siswa.id_siswa)
                        var id_siswa = siswa.id_siswa
                        $('#daftarsiswa').append('<option value=' + siswa.id_siswa + '>' + siswa.nama_siswa + '</option>');
                        $('#daftarsiswa').select2();
                    })
                    
                })
        });
    });   

    $('#modal').on('submit', function(event) {
    event.preventDefault(); // Mencegah submit default
    var idSiswa = $('#daftarsiswa').val();
    console.log('ID Siswa yang dipilih:', idSiswa);


    // Kirim data ke server menggunakan AJAX atau form submit biasa
    // Contoh menggunakan AJAX dengan jQuery:
    $.ajax({
      url: '/api/daftarhadir', // Ganti dengan URL endpoint di server
      method: 'POST',
      data: {
        id_siswa : idSiswa
      },
      success: function(response) {
        console.log('Data berhasil dikirim:');
        document.getElementById("modal").style.display = "none";
        document.getElementById("pop-up").style.display = "block";

        // Tampilkan pesan sukses atau lakukan tindakan lain
      },
      error: function(error) {
        console.error('Terjadi kesalahan:', error);
        // Tampilkan pesan error
      }
    });
  });

  </script>
</html>

