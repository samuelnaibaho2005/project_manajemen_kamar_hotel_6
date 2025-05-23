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
                    <td>A-{{ $admin->id }}</td>
                    <td>{{ $admin->nama_admin }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ url('/admin/editDataAdmin/'.$admin->id) }}" class="btn edit-btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id="{{ $admin->id }}"
                        data-nama="{{ $admin -> nama_admin }}"
                        data-email="{{ $admin -> email }}">Edit <i class="bi bi-pencil-square"></i></a>
                        <form action="{{ url('/admin/delete/'.$admin->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus admin ini?')">Hapus <i class="bi bi-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalAdmin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalAdmin">Edit Data Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="editForm" id="editForm" method="POST">
        @csrf
        @method ('PUT')
          <div class="mb-3">
            <input type="hidden" class="form-control" id="id">
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="nama" class="col-form-label">Nama</label>
            <input type="text" class="form-control" id="nama_admin" name="nama_admin" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" id="update" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- script js -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    const editForm = document.getElementById('editForm');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const email = this.getAttribute('data-email');
            const nama = this.getAttribute('data-nama');

            document.getElementById('email').value = email;
            document.getElementById('nama_admin').value = nama;

            // Ganti action form edit sesuai ID
            editForm.action = `/admin/update/${id}`;
        });
    });
});
</script>

</div>

@include('layouts.footer')