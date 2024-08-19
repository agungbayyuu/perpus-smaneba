@extends('home')

@section('kelas')
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Absen Pengunjung</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kelas
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <select name="" id="">
                    
                </select>
            </div>
        </div>

            <input type="Nama" placeholder=" Nama Pengunjung">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeform()">Cancel</button>
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </div>
@endsection
