@include ('layouts.header')

@section('content')
<div class="container">
    <div class="row">
        <!-- Kolom Kamar -->
        <div class="col-md-7">
            <h4>DAFTAR KAMAR</h4>
                <div class="card area_card p-3">
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="row">
                            <div>
                                <strong><i class="bi bi-houses"></i> Nomor Kamar : </strong> <br>
                                <strong><i class="bi bi-award-fill"></i> Kelas : </strong><br>
                                <strong><i class="bi bi-cart4"></i> Status : </strong>
                            </div>
                            <p class="d-inline-flex gap-2 mt-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">Booking</button>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detail</a>
                            </p>
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                    <p>Lantai : </p>
                                    <p>Jumlah Tempat Tidur : </p>
                                    <p>Harga per Hari : </p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                </div>
        </div>
<!-- Kolom Summary -->
        <div class="col-md-5">
            <h4>SUMMARY</h4>
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