@include('layouts.header')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><center>Selamat Datang di Dashboard Admin</center></h1>
            <div class="card">
                <div class="card-body con">
                    <p>Disini admin bertugas untuk melakukan membantu tamu dalam pemesanan kamar.
                        <br>Silahkan melakukan pekerjaan anda dengan baik 😉☺️.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row mt-2 gap-2">
    <div class="card con" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-person-vcard" style="font-size: 2rem; "></i> Data Admin</h5>
                <p class="card-text">Data seluruh admin yang sudah mendaftar</p>
                <a href="#" class="btn btn-primary">Data Admin</a>
        </div>
    </div>
    <div class="card con" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-building-add" style="font-size: 2rem; "></i></i> Reservasi</h5>
                <p class="card-text">Membuat reservasi kamar untuk tamu</p>
                <a href="#" class="btn btn-primary">Reservasi</a>
        </div>
    </div>
    <div class="card con" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-card-checklist" style="font-size: 2rem; "></i></i> Data Kamar</h5>
                <p class="card-text">Untuk mengelola kamar pada hotel</p>
                <a href="#" class="btn btn-primary">Data Kamar</a>
        </div>
    </div>
    </div>
@include('layouts.footer')

<style>
    .con{
        /* padding-bottom: 15px; */
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    }
</style>