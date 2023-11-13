<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
     public function index()
    {
        return view('register.index',[
            "title" => "Register",
            "Halaman" => "Register",
            "active" => "Register",
        ]);
    }
    // ini adalah function untuk membuat sebuah table / reigster
    public function store(Request $request){
       $validatedData = $request->validate([
    // kita tinggal pilih mau | atau di bungkus dengan array 
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            // dns adalah nama domainnya
            'email' => 'required|email:dns|unique:users',
    // gk perlu kita berikan unique karena gawat kalau password sudah ada yang pake
            'password' => 'required|min:5|max:255'
        ]);

        // enkripsi data passwordnya
        // $validatedData['password'] = bcrypt($validatedData['password']); cara pertama
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create($validatedData);
        

        // dikirimkan ke /login
        // $request->session()->flash('success','Registrasi successfull! Please login');
        $request = session();
        $request->flash('success', 'Registration successfull! Please login');

        /* 
            kalau flash message tidak muncul: coba check file bladenya harus di login.index, bukan di register.index ;v.
            Undefined method 'flash'.intelephense(1013):
            $request = session();
            $request->flash('success', 'Registration successfull! Please login');
            atau 
            return redirect('/login')->with('success', 'Registration successfull! Please login'); -> redirect ke halaman login dengan membawa flash message ini, jadi sama saja
        */

        return redirect('/login');
    }

}
