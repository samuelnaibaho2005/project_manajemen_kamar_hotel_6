@include('layouts.header')

<div class="container mt-4">
    <div class="col-md-7">
    <a href="{{ route('reservasi') }}" class="btn btn-primary mt-2 mb-2">Kembali</a>
    <h3>Riwayat Reservasi</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @foreach ($reservasi as $r)
    <div class="card area_card p-3 mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="row">
                <div>
                    <h5><strong><i class="bi bi-person-fill"></i> Nama : </strong> {{ $r->nama_tamu }}</h5>
                    <h5><strong><i class="bi bi-telephone-fill"></i> No. Telepon : </strong> {{ $r->no_tlpn }}</h5>
                    <h5><strong><i class="bi bi-houses"> </i>No. Kamar : </strong> {{ $r->kamar->no_kamar ?? 'N/A' }}</h5>
                </div>
                <div class="d-flex gap-2">
                    <p>
                        <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseDetail{{ $r->id_reservasi }}" role="button" aria-expanded="false" aria-controls="collapseDetail{{ $r->id_reservasi }}">Detail</a>
                    </p>
                    <form action="{{ route('reservasi.delete', $r->id_reservasi) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data reservasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse" id="collapseDetail{{ $r->id_reservasi }}">
                        <div class="card card-body">
                            <p><strong><i class="bi bi-people"></i> Jumlah Tamu : </strong> {{ $r->jlh_tamu }}</p>
                            <p><strong><i class="bi bi-calendar2-check"></i> Tanggal Check-In : </strong> {{ $r->tgl_check_in }}</p>
                            <p><strong><i class="bi bi-calendar2-x"></i> Tanggal Check-Out : </strong> {{ $r->tgl_check_out }}</p>
                            <p><strong>Total Biaya : </strong> Rp{{ number_format($r->total_biaya, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

<!-- style CSS -->
<style>
    .area_card{
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    }
</style>
@include('layouts.footer')
