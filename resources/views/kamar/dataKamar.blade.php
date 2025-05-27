@include ('layouts.header')

@section('content')
<div class="container">
  <h1><center>Data Kamar Hotel</center></h1>
  <div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKamarModal"><i class="bi bi-plus-circle"></i> Tambah Data Kamar</button>
  </div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
      <th scope="col">ID Kamar</th>
      <th scope="col">No Kamar</th>
      <th scope="col">Lantai</th>
      <th scope="col">Jumlah Tempat Tidur</th>
      <th scope="col">Kelas Kamar</th>
      <th scope="col">Harga Perhari</th>
      <th scope="col">Status Kamar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kamars as $index=>$kamar)    
    <tr>
      <td>K-{{ $kamar->id_kamar }}</td>
      <td>{{ $kamar->no_kamar }}</td>
      <td>Lantai {{ $kamar->lantai_kamar }}</td>
      <td><center>{{ $kamar->jlh_bed }}</center></td>
      <td>Kelas {{ $kamar->kelas_kamar }}</td>
      <td>Rp{{ number_format($kamar->harga_perhari, 0, ',', '.')}}</td>
      <td>{{ $kamar->status_kamar }}</td>
      <td>
        <a href="{{ url('/kamar/editDataKamar/'.$kamar->id_kamar) }}" class="btn edit-btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id_kamar="{{ $kamar->id_kamar }}"
                        data-no_kamar="{{ $kamar -> no_kamar }}"
                        data-lantai_kamar="{{ $kamar -> lantai_kamar }}"
                        data-jlh_bed="{{ $kamar -> jlh_bed }}"
                        data-kelas_kamar="{{ $kamar -> kelas_kamar }}"
                        data-harga_perhari="{{ $kamar -> harga_perhari }}"
                        data-status_kamar="{{ $kamar -> status_kamar }}">Edit <i class="bi bi-pencil-square"></i></a>
        <form action="{{ url('/kamar/delete/'.$kamar->id_kamar) }}" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus <i class="bi bi-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal Tambah Data Kamar -->
<div class="modal fade" id="tambahKamarModal" tabindex="-1" aria-labelledby="tambahKamarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('kamar.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahKamarLabel"><strong>Tambah Data Kamar</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <input type="hidden" class="form-control" id="id_kamar">
            </div>
            <div class="mb-3">
                <label for="no_kamar" class="col-form-label"><strong>No Kamar</strong></label>
                <input type="text" name="no_kamar" class="form-control" required>
            </div>
            <label for="lantai_kamar" class="col-form-label"><strong>Lantai Kamar</strong></label>
            <select class="form-select mb-3" aria-label="Default select example" name="lantai_kamar" id="lantai_kamar">
              <option selected>Pilih lantai...</option>
              <option value="1">Lantai 1</option>
              <option value="2">Lantai 2</option>
              <option value="3">Lantai 3</option>
              <option value="4">Lantai 4</option>
            </select>
            <div class="mb-3">
                <label for="jlh_bed" class="col-form-label"><strong>Jumlah Tempat Tidur</strong></label>
                <input type="number" name="jlh_bed" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelas_kamar" class="col-form-label"><strong>Kelas Kamar</strong></label>
                <select name="kelas_kamar" aria-label="Default select example" class="form-control" required>
                    <option selected>Pilih kelas...</option>
                    <option value="A">Kelas A</option>
                    <option value="B">Kelas B</option>
                    <option value="C">Kelas C</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga_perhari" class="col-form-label"><strong>Harga per Hari</strong></label>
                <input type="text" name="harga_perhari" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status_kamar" class="col-form-label"><strong>Status Kamar</strong></label>
                <select class="form-select" aria-label="Default select example" name="status_kamar" id="status_kamar">
                  <option selected>Pilih status..</option>
                  <option value="Sudah Dibooking">Sudah Dibooking</option>
                  <option value="Belum Dibooking">Belum Dibooking</option>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>


<!-- Modal Edit Data Kamar-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalKamar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalKamar">Edit Data Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="editForm" id="editForm" method="POST">
          @csrf
          @method('PUT')
          <div>
            <input type="hidden" class="form-control" id="id_kamar" name="id_kamar">
          </div>
          <div class="mb-3">
            <label for="no_kamar" class="col-form-label">No Kamar</label>
            <input type="text" class="form-control" id="no_kamar" name="no_kamar" required>
          </div>
          <label for="lantai_kamar" class="col-form-label">Lantai Kamar</label>
          <select class="form-select" aria-label="Default select example" name="lantai_kamar" id="lantai_kamar">
            <option selected value="1">Lantai 1</option>
            <option value="2">Lantai 2</option>
            <option value="3">Lantai 3</option>
            <option value="4">Lantai 4</option>
          </select>
          <div class="mb-3">
            <label for="jlh_bed" class="col-form-label">Jumlah Tempat Tidur</label>
            <input type="number" class="form-control" id="jlh_bed" name="jlh_bed" required>
          </div>
          <label for="kelas_kamar" class="col-form-label">Kelas Kamar</label>
          <select class="form-select" aria-label="Default select example" name="kelas_kamar" id="kelas_kamar">
            <option selected>Pilih kelas..</option>
            <option value="A">Kelas A</option>
            <option value="B">Kelas B</option>
            <option value="C">Kelas C</option>
          </select>
          <div class="mb-3">
            <label for="harga_perhari" class="col-form-label">Harga per Hari</label>
            <input type="text" class="form-control" id="harga_perhari" name="harga_perhari" required>
          </div>
          <label for="status_kamar" class="col-form-label">Status Kamar</label>
          <select class="form-select" aria-label="Default select example" name="status_kamar" id="status_kamar">
            <option value="Sudah Dibooking">Sudah Dibooking</option>
            <option value="Belum Dibooking" selected>Belum Dibooking</option>
          </select>
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
            const id_kamar = this.getAttribute('data-id_kamar');
            const no_kamar = this.getAttribute('data-no_kamar');
            const lantai_kamar = this.getAttribute('data-lantai_kamar');
            const jlh_bed = this.getAttribute('data-jlh_bed');
            const kelas_kamar = this.getAttribute('data-kelas_kamar');
            const harga_perhari = this.getAttribute('data-harga_perhari');
            const status_kamar = this.getAttribute('data-status_kamar');

            // Set form action
            editForm.action = `/kamar/update/${id_kamar}`;
            
            // Set form values
            document.getElementById('id_kamar').value = id_kamar;
            document.getElementById('no_kamar').value = no_kamar;
            document.getElementById('lantai_kamar').value = lantai_kamar;
            document.getElementById('jlh_bed').value = jlh_bed;
            document.getElementById('kelas_kamar').value = kelas_kamar;
            document.getElementById('harga_perhari').value = harga_perhari;
            document.getElementById('status_kamar').value = status_kamar;
        });
    });
});
</script>

</div>
@include('layouts.footer')