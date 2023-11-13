<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            "title" => "login",
            "Halaman" => "Login",
            "active" => "Login",
        ]);
    }
    public function authenticate( Request $request)
    {
        $credibels = $request->validate([
            // dns itu berfungsi seperti yahoo.com yang penting ada titik nya, kalau tidak ada titik nya  akan di anggab salah
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

            // kita cek dengan class auth dengan method attemp dan mengcek $credibels nya berhasil atau tidak , kalau berhasil maka akan di eksekusi, sambil mengcek apakah email dan password sudah ada atau tidak didalam database
        if(Auth::attempt($credibels)){
            // kita jalankan sessionnya sekaligun di reset sessionnya
            $request->session()->regenerate();
            // kita pindah kan kehalaman dashbord sekaligus menyimpan sessionnya dengan intended()
            return redirect()->intended('/dashboard');
        }
            // jika gagal login
    // kita tidak mengkasih tau bahwa password nya salah supaya si hack tidak tau kalau misalkan passwordnya salah dia kan jadi tau kalau emailnya sudah pernah terdaftar
        return back()->with('loginEror','Login failed!');

    }

    public function logout(Request $request){

        Auth::logout();
        //  supaya gk bisa di pakai sessionnya
        $request->session()->invalidate();
        // bikin baru sessionnya
        $request->session()->regenerateToken();
        // balikkan mau kehalaman mana 
        return redirect('/');
    }
}
