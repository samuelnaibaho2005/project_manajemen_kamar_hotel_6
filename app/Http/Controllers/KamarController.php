<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kamar; //untuk mengambil data dari tabel kamar
class KamarController extends Controller{
    public function index(){
        $kamars = kamar::all();
        return view ('kamar/dataKamar', compact('kamars'));
    }
}