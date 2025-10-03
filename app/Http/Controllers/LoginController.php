<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function dash()
    {
        $data ['guru'] = guru::all();
        return view('admin.dashboard', $data);
    }
    
    public function show(Request $request)
    {
        return view('loginpage.login');
    }

    public function login(Request $request)
    {
        $validasi = $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);

        if (Auth::attempt($validasi)) {
            if(Auth::user()->role == 'admin'){
                 return redirect()->route('admin.dash')->with('success', 'Login berhasil sebagai Admin!');
            }else if(Auth::user()->role == 'operator'){
                return redirect()->route('operator')->with('success', 'Login berhasil sebagai Operator!');
            }
             return redirect()->back()->with('success','Login Berhasil!');
        }
        return redirect()->back()->with('error','Login Gagal!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('beranda')->with('Message','Logout Berhasil!');
    }
}
