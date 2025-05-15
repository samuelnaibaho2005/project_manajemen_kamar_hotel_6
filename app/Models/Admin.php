<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'admin'; //nama table di database
    protected $fillable=[ //kolom yang akan diisi
        'email',
        'nama_admin',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
