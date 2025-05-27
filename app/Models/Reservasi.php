<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';
    protected $fillable = [
        'id_kamar',
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
        'total_biaya'
    ];

    public function kamar(){
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }

}
