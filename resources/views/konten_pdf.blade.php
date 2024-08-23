<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      margin:   
 20px;
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table thead tr th {
      background-color: #f1f1f1;
      padding: 8px;
      border: 1px solid #ddd;
      text-align: left;
    }

    table tbody tr td {
      padding: 5px;
      border: 1px solid #ddd;
    }

    .centered-content {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h5 {
      margin: 10px 0;
      color: #333;
    }

    h6 {
      margin: 5px 0;
      color: #888;
    }

    a {
      text-decoration: none;
      color: #333;
    }

    a:hover {
      color: #007bff;
    }
  </style>
	<title>Pengunjung Terbanyak - PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <center>
      <h5>Pengunjung Terbanyak</h4>
      <h6>Periode : </h5>
    </center>
 
	<table class='table table-bordered'>
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
 
</body>
</html>