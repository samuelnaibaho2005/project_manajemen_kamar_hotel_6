<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registrasi</title>
</head>
<body>
    <div class="container-lg">
        <div class="title">
            <h1>Registrasi</h1>
            <h6>Silahkan registrasi sebagai admin</h6>
        </div>

        <!-- menampilkan pesan sukses -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- menampilkan pesan error -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- form -->
        <form action="{{ url('/admin/registrasi') }}" method="POST">
        @csrf
        <div class="form-reg">
            <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
            </div>
            <div class="mb-3 row">
            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNama" name="nama_admin" required>
            </div>
            </div>
            <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" required>
            </div>
            </div>
        </div>
        <p>sudah punya akun? <a href="{{url('/admin/login')}}">Login</a></p>
        <button type="submit" class="btn btn-primary" name="btn_daftar">Daftar</button>
        </form>
    </div>
</body>
</html>