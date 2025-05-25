@include('layouts.header')

<div class="container mt-4">
    <a href="{{ route('reservasi') }}" class="btn btn-primary mt-2 mb-2">Kembali ke Daftar Kamar</a>
    <h3>Riwayat Reservasi</h3>
    @foreach ($reservasi as $r)
    <div class="card p-3 mb-3">
        <p><strong>Nama : </strong> {{ $r->nama_tamu }}</p>
        <p><strong>No. Telepon : </strong> {{ $r->no_tlpn }}</p>
        <p><strong>Jumlah Tamu : </strong> {{ $r->jlh_tamu }}</p>
        <p><strong>No. Kamar : </strong> {{ $r->kamar->no_kamar ?? 'N/A' }}</p>
        <p><strong>Tanggal Check-In : </strong> {{ $r->tgl_check_in }}</p>
        <p><strong>Tanggal Check-Out : </strong> {{ $r->tgl_check_out }}</p>
        <p><strong>Total Biaya : </strong> Rp{{ number_format($r->total_biaya, 0, ',', '.') }}</p>
    </div>
    @endforeach
</div>

@include('layouts.footer')
