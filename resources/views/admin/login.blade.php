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
        <div class="form-reg">
            <div class="mb-3 row">
            <label for="IDadmin" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="IDadmin">
            </div>
            </div>
            <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
            </div>
            </div>
        </div>
        <p>belum punya akun? <a href="/admin/registrasi">Registrasi</a></p>
    </div>
</body>
</html>