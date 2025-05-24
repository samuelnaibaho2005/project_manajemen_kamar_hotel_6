<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    // public function index(){
    //     $reservasi = Reservasi::all();
    //     return view ('reservasi/dataReservasi', compact('reservasi'));
    // }

    public function index(){
        $kamars = Kamar::all();
        return view ('reservasi/dataReservasi', compact('kamars'));
    }

    public function store(Request $request){
        // $validated = $request->validate([
        //     'nama_tamu' => 'required',
        //     'no_tlpn' => 'required',
        //     'jlh_tamu' => 'required|numeric|min:1',
        //     'tgl_check_in' => 'required|date',
        //     'tgl_check_out' => 'required',
        // ]);

        Reservasi::create([
            'kamar_id' => $request['kamar_id'],
            'nama_tamu' => $request['nama_tamu'],
            'no_tlpn' => $request['no_tlpn'],
            'jlh_tamu' => $request['jlh_tamu'],
            'tgl_check_in' => $request['tgl_check_in'],
            'tgl_check_out' => $request['tgl_check_out'],
        ]);
        Kamar::where('id', $request->kamar_id)->upddate([
            'status_kamar' => 'Sudah Dibooking'
        ]);

        return redirect()->back()->with('success', 'Data kamar berhasil ditambahkan');
    }
}