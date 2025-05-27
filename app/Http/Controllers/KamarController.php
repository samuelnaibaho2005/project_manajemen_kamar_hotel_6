<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar; //untuk mengambil data dari tabel kamar
class KamarController extends Controller{
    public function index(){
        $kamars = Kamar::all();
        return view ('kamar/dataKamar', compact('kamars'));
    }

    public function create(){
        return view('kamar.dataKamar');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'no_kamar' => 'required',
            'lantai_kamar' => 'required|in:1,2,3,4',
            'jlh_bed' => 'required|numeric|min:1',
            'kelas_kamar' => 'required|in:A,B,C',
            'harga_perhari' => 'required',
            'status_kamar' => 'required|in:Sudah Dibooking,Belum Dibooking',
        ]);

        Kamar::create([
            'no_kamar' => $validated['no_kamar'],
            'lantai_kamar' => $validated['lantai_kamar'],
            'jlh_bed' => $validated['jlh_bed'],
            'kelas_kamar' => $validated['kelas_kamar'],
            'harga_perhari' => $validated['harga_perhari'],
            'status_kamar' => $validated['status_kamar'],
        ]);

        return redirect()->back()->with('success', 'Data kamar berhasil ditambahkan');
    }

    public function update(Request $request, $id_kamar){
        $kamar = Kamar::findOrFail($id_kamar);

        $kamar->update([
            'no_kamar' => $request->no_kamar,
            'lantai_kamar' => $request->lantai_kamar,
            'jlh_bed' => $request->jlh_bed,
            'kelas_kamar' => $request->kelas_kamar,
            'harga_perhari' => $request->harga_perhari,
            'status_kamar' => $request->status_kamar,
        ]);
        return redirect()->back()->with('success', 'Data kamar berhasil diupdate');
    }

    public function destroy($id_kamar){
        $kamar = Kamar::findOrFail($id_kamar); //cari kamar berdasarkan id_kamar
        $kamar->delete(); //hapus datanya
    
        return redirect('/kamar/dataKamar')->with('success', 'Data kamar berhasil dihapus');
    }
}