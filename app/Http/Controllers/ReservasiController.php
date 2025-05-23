<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index(){
        $reservasis = Reservasi::all();
        return view ('reservasi/dataReservasi', compact('reservasis'));
    }
}
