<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container-lg">
        <div class="title">
            <h1>Login</h1>
            <h6>Silahkan login sebagai admin</h6>
        </div>

        @if ($errors->has('login_gagal'))
            <div class="alert alert-danger">
                {{ $errors->first('login_gagal') }}
            </div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
        @csrf <!-- token CSRF untuk keamanan -->
        <div class="form-reg">
            <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
            </div>
            <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" required>
            </div>
            </div>
        </div>
        <p>belum punya akun? <a href="{{url('/admin/registrasi')}}">Registrasi</a></p>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
    </form>
</body>
</html>