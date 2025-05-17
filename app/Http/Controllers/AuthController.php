<?php

namespace App\Http\Controllers;

// use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AuthController extends Controller
{   
    //untuk menampilkan form registrasi
    public function showRegister(){
        return view('admin.registrasi');
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|string|unique:admin,email',
            'nama_admin' => 'required|string|max:45',
            'password' => 'required|min:10',
        ]);

        Admin::create([
            'nama_admin' => $request->nama_admin,
            'email'=>$request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('admin/login')->with('success','Registrasi berhasil, silahkan login');
    }
    //menampilkan form login
    public function showLogin(){
        return view('admin.login');
    }

    //proses login
    public function login(Request $request){
        $credentials = $request->validate([ 
            'email'=>'required', //validasi email dan password bersifat yg wajib
            'password'=>'required',
        ]);

        $admin = Admin::where('email',$credentials['email'])->first();

        // Menggunakan Hash::check untuk membandingkan password
        if($admin && Hash::check($credentials['password'], $admin->password)){
            Auth::guard('admin')->login($admin);
            return redirect('/admin/dashboard');
        }

        return back()->withErrors([
            'login_gagal' => 'Email atau Password anda salah',
        ]);
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
