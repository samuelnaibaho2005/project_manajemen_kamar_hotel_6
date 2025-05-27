@include ('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <!-- Kolom Kamar -->
        <div class="col-md-7">
            <h3>DAFTAR KAMAR</h3>
            <div class="card area_card p-3">
                @foreach($kamars as $kamar)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="row">
                            <div>
                                <strong><i class="bi bi-houses"></i> No. Kamar : {{ $kamar->no_kamar }}</strong> <br>
                                <strong><i class="bi bi-award-fill"></i> Kelas : {{ $kamar->kelas_kamar }}</strong><br>
                                <strong><i class="bi bi-cart4"></i> Status : {{ $kamar->status_kamar }}</strong>
                            </div>
                            <p class="d-inline-flex gap-2 mt-2">
                                <button class="btn btn-primary booking-btn" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $kamar->id }}"
                                data-id_kamar = "{{ $kamar->id_kamar }}" 
                                data-no_kamar = "{{ $kamar->no_kamar }}" 
                                data-lantai_kamar = "{{ $kamar->lantai_kamar }}" 
                                data-kelas_kamar = "{{ $kamar->kelas_kamar }}" 
                                data-harga_perhari = "{{ $kamar->harga_perhari }}">
                                Booking</button>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseDetail{{ $kamar->id_kamar }}" role="button" aria-expanded="false" aria-controls="collapseDetail{{ $kamar->id_kamar }}">Detail</a>
                            </p>
                            <div class="col">
                                <div class="collapse multi-collapse" id="collapseDetail{{ $kamar->id_kamar }}">
                                <div class="card card-body">
                                    <p><i class="bi bi-bar-chart-steps"></i> Lantai : {{ $kamar->lantai_kamar }}</p>
                                    <p><i class="bi bi-square-half"></i> Jumlah Tempat Tidur : {{ $kamar->jlh_bed }}</p>
                                    <p><i class="bi bi-tags"></i> Harga per Hari : Rp{{ $kamar->harga_perhari }}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <!-- Modal Booking -->
                <div class="modal fade" id="bookingModal{{ $kamar->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="{{ route('reservasi.store') }}" method="POST" id="formBooking{{ $kamar->id }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Booking Kamar {{ $kamar->no_kamar }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_kamar" class="form-control" value="{{ $kamar->id_kamar }}">
                                <div class="mb-2">
                                    <label>Nama Tamu</label>
                                    <input type="text" name="nama_tamu" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_tlpn" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label>Jumlah Tamu</label>
                                    <input type="number" name="jlh_tamu" class="form-control" required>
                                </div>
                                <input type="hidden" name="no_kamar" class="form-control" value="{{ $kamar->no_kamar }}">
                                <input type="hidden" name="lantai_kamar" class="form-control" value="{{ $kamar->lantai_kamar }}">
                                <input type="hidden" name="jlh_bed" class="form-control" value="{{ $kamar->jlh_bed }}">
                                <input type="hidden" name="kelas_kamar" class="form-control" value="{{ $kamar->kelas_kamar }}">
                                <input type="hidden" name="harga_perhari" class="form-control" value="{{ $kamar->harga_perhari }}">
                                <input type="hidden" name="status_kamar" class="form-control" value="{{ $kamar->status_kamar }}">
                                <div class="mb-2">
                                    <label>Tanggal Check-in</label>
                                    <input type="date" name="tgl_check_in" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label>Tanggal Check-out</label>
                                    <input type="date" name="tgl_check_out" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan Reservasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                @endforeach
                </div>
        </div>
        <a class="" href="{{ route('reservasi.pesanan') }}">Reservasi</a>

    </div>
</div>
<!-- style CSS -->
<style>
    .area_card{
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    }
</style>

@include ('layouts.footer');