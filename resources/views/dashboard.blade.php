<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard Perpustakaan</title>
  <link rel="icon" href="/logo-smaneba.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
    .sidebar-img {
      width: 200px;
      margin: 20px auto;
    }
    @media (max-width: 1920px) {
        .sidebar-img {
            width: 300px;
        }
    }
    @media (max-width: 1000px) {
        .sidebar-img {
            width: 190px;
        }
    }
    @media (max-width: 768px) {
        .sidebar-img {
            width: 150px;
        }
    }

    @media (max-width: 480px) {
        .sidebar-img {
            width: 100px;
        }
    }

  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    @yield('sidebar')
    <br>
    @yield('konten')
    <br>
    @yield('konten_pdf')
  </div>
</div>

</body>
</html>