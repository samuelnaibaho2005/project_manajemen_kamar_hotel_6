<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tamu',
        'no_tlpn',
        'jlh_tamu',
        'no_kamar',
        'lantai_kamar',
        'jlh_bed',
        'kelas_kamar',
        'harga_perhari',
        'status_kamar',
        'tgl_check_in',
        'tgl_check_out',
    ];
}
