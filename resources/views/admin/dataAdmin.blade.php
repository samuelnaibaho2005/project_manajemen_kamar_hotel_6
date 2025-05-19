@include ('layouts.header')

<div class="container mt-4">
    @yield('content')
    <h3>Data Admin</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $index => $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->nama_admin }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ url('/admin/editDataAdmin/'.$admin->id) }}" class="btn btn-warning btn-sm">Edit <i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus <i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layouts.footer')