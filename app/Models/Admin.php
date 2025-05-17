<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable //mengikutkan fila authenticatable untuk fitur auth
{
    use HasFactory;
    use Notifiable; // trait untuk notifikasi

    protected $table = 'admin'; //nama table di database
    protected $fillable=[ //kolom yang akan diisi
        'email',
        'nama_admin',
        'password',
    ];

    protected $hidden = [ //data yg akan disembunykan
        'password',
        'remember_token',
    ];
}
