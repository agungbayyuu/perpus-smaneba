<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo-smaneba.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin Perpustakaan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top: 80px"><br>
        <div class="col-md-4 col-md-offset-4">
            <img src="Perpustakaan.png" alt="" height="120px" width="350px" style="margin: auto">
            <hr>
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="" style="border-radius: 10px; height: 40px;">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" style="border-radius: 10px; height: 40px;">
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #16877d; border-radius: 10px; margin-top: 40px; height: 40px;">Log In</button>
                <hr>
            </form>
        </div>
    </div>
</body>
</html>