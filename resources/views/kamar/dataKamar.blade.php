@include ('layouts.header')

@section('content')
<div class="container">
  <h1><center>Data Kamar Hotel</center></h1>
  <div class="d-flex justify-content-end mb-3">
    <a href="" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Data Kamar</a>
  </div>
<table class="table table-striped table-hover">
    <thead>
    <tr>
      <th scope="col">ID</th>
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
      <!-- <th scope="row">1</th> -->
      <td>{{ $kamar->id }}</td>
      <td>{{ $kamar->no_kamar }}</td>
      <td>{{ $kamar->lantai_kamar }}</td>
      <td>{{ $kamar->jlh_bed }}</td>
      <td>{{ $kamar->kelas_kamar }}</td>
      <td>{{ $kamar->harga_perhari }}</td>
      <td>{{ $kamar->status_kamar }}</td>
      <td>
        <a href="{{ url('/kamar/editDataKamar/'.$kamar->id) }}" class="btn edit-btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id="{{ $kamar->id }}"
                        data-no_kamar="{{ $kamar -> no_kamar }}"
                        data-lantai_kamar="{{ $kamar -> lantai_kamar }}"
                        data-jlh_bed="{{ $kamar -> jlh_bed }}"
                        data-kelas_kamar="{{ $kamar -> kelas_kamar }}"
                        data-harga_perhari="{{ $kamar -> harga_perhari }}"
                        data-status_kamar="{{ $kamar -> status_kamar }}">Edit <i class="bi bi-pencil-square"></i></a>
                        <form action="{{ url('/kamar/delete/'.$kamar->id) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kamar ini?')">Hapus <i class="bi bi-trash"></i></button>
      </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@include('layouts.footer')