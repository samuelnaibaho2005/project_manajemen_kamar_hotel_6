<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';
    protected $fillable = [
        'no_kamar',
        'lantai_kamar',
        'jlh_bed',
        'kelas_kamar',
        'harga_perhari',
        'status_kamar'
    ];
}
