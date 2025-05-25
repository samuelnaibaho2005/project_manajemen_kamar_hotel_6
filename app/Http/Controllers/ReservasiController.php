<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ReservasiController extends Controller
{
    
    public function index(){
        $reservasi = Reservasi::with('kamar')->get();
        $kamars = Kamar::all();
        return view ('reservasi/dataReservasi', compact('reservasi', 'kamars'));
    }

public function store(Request $request){
    Log::info('Data yang diterima:', $request->all());
    $request->validate([
        'id_kamar' => 'required|exists:kamars,id_kamar',
        'nama_tamu' => 'required|string',
        'no_tlpn' => 'required|string',
        'jlh_tamu' => 'required|integer',
        'no_kamar' => 'required',
        'lantai_kamar' => 'required',
        'jlh_bed' => 'required',
        'kelas_kamar' => 'required',
        'harga_perhari' => 'required',
        'status_kamar' => 'required|string',
        'tgl_check_in' => 'required|date',
        'tgl_check_out' => 'required|date|after_or_equal:tgl_check_in',
        'total_biaya' => 'required'
    ]);
    
    // Ambil info kamar
    $kelasHarga = [
        'A' => 600000,
        'B' => 450000,
        'C' => 200000
    ];
    
    // Hitung jumlah hari
    $start = new \DateTime($request->tgl_check_in);
    $end = new \DateTime($request->tgl_check_out);
    $days = $start->diff($end)->days ?: 1;

    // Hitung total
    $harga_kamar = $kelasHarga[$request->kelas_kamar] ?? 0;
    $biaya_tamu = $request->jlh_tamu * 50000;
    $total_biaya = ($harga_kamar + $biaya_tamu) * $days;

    // Simpan reservasi
    $reservasi = Reservasi::create([
        'id_kamar' => $request->id_kamar,
        'nama_tamu' => $request->nama_tamu,
        'no_tlpn' => $request->no_tlpn,
        'jlh_tamu' => $request->jlh_tamu,
        'no_kamar' => $request->no_kamar,
        'lantai_kamar'=> $request->lantai_kamar,
        'jlh_bed' => $request->jlh_bed,
        'kelas_kamar' => $request->kelas_kamar,
        'harga_perhari' => $request->harga_perhari,
        'status_kamar' => $request->status_kamar,
        'tgl_check_in' => $request->tgl_check_in,
        'tgl_check_out' => $request->tgl_check_out,
        'total_biaya' => $total_biaya
    ]);
    // Ambil ulang data reservasi untuk ditampilkan di summary
    $reservasi = Reservasi::with('kamar')->latest()->first();
    // return view('reservasi.pesanan', compact('reservasi'));
    return redirect()->route('reservasi.pesanan');

}

public function pesanan() {
    $reservasi = Reservasi::with('kamar')->latest()->get();
    return view('reservasi.pesanan', compact('reservasi'));
}

}