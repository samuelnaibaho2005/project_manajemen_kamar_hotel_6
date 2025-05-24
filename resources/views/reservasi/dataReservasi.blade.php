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
                                <strong><i class="bi bi-houses"></i> Nomor Kamar : {{ $kamar->no_kamar }}</strong> <br>
                                <strong><i class="bi bi-award-fill"></i> Kelas : {{ $kamar->kelas_kamar }}</strong><br>
                                <strong><i class="bi bi-cart4"></i> Status : {{ $kamar->status_kamar }}</strong>
                            </div>
                            <p class="d-inline-flex gap-2 mt-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $kamar->id }}">Booking</button>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detail</a>
                            </p>
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <p>Lantai : {{ $kamar->lantai_kamar }}</p>
                                    <p>Jumlah Tempat Tidur : {{ $kamar->jlh_bed }}</p>
                                    <p>Harga per Hari : {{ $kamar->harga_perhari }}</p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <!-- Modal Booking -->
                <div class="modal fade" id="bookingModal{{ $kamar->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="{{ route('reservasi.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Booking Kamar {{ $kamar->no_kamar }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Hidden kamar_id -->
                                <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">

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
<!-- Kolom Summary -->
        <div class="col-md-5">
            <h3>SUMMARY</h3>
            <div class="card area_card">
                <div class="card-body" id="summaryContent">
                    <p><strong>Nama Tamu:</strong> <span id="summaryNama"></span></p>
                    <p><strong>No HP:</strong> <span id="summaryHp"></span></p>
                    <p><strong>Jumlah Tamu:</strong> <span id="summaryJumlah"></span></p>
                    <p><strong>No Kamar:</strong> <span id="summaryKamar"></span></p>
                    <p><strong>Lantai:</strong> <span id="summaryLantai"></span></p>
                    <p><strong>Tgl Check In:</strong> <span id="summaryCheckIn"></span></p>
                    <p><strong>Tgl Check Out:</strong> <span id="summaryCheckOut"></span></p>
                    <hr>
                    <p><strong>Total: Rp</strong> <span id="summaryTotal">-</span></p>
                    <button class="btn btn-secondary"><i class="bi bi-filetype-pdf"></i> Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .area_card{
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    }
</style>


@include ('layouts.footer');