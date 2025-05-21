<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><img src="{{ url('/') }}" alt="">Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin/dashboard"><strong>Hotel Manajemen</strong></a>
            <ul class="navbar-nav menuSet gap-3 flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/kamar">Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/reservasi">Reservasi</a>
                </li>
            </ul>
            <div class="log">
                <a href="{{ url('/admin/logout') }}">Logout<i class="bi iconLog bi-box-arrow-right"></i></a>
            </div>
        </div>
        </div>
    </nav>
    <div class="container mt-4">

    <style>
        .log{
            margin-left: 100px;
        }
        .ul{
            margin-left: 40px;
        }
        .log i{
            color: white;
            margin: 0 10px;
        }
        .log a{
            color: white;
            text-decoration: none;
        }
    </style>