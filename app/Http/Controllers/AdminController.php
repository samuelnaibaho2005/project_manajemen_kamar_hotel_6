<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; //untuk mengambil data dari tabel admin
class AdminController extends Controller
{
    public function index(){
        $admin = Admin::all(); //ambil semua data admin dari database
        return view('admin/dataAdmin', compact('admin'));//mengirim data ke view admin.blade 
    }

    //edit
    public function edit($id){
        $admin = Admin::findOrFail($id); //mencari data admin berdasarkan id, atau gagal menemukannya
        return view('admin.dataAdmin', compact('admin')); //mengirim dalam ke edit.blade
    }

    //untuk update data admin
    public function update(Request $request, $id){ //Request $request untuk menangkap data admin dari form
        $request->validate([
            'email'=>'required',
            'nama_admin'=> 'required',
        ]);
        //mengambil data berdasarkan id
        $admin = Admin::findOrFail($id);

        //update date
        $admin->email=$request->email;
        $admin->nama_admin=$request->nama_admin; 
        $admin->save();//menyimpan perubahan    

        return redirect('/admin/dataAdmin')->with('success', 'Data admin berhasil diperbarui');
    }
}
