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
                return redirect()->route('admin.dash');
            }else if(Auth::user()->role == 'operator'){
                return redirect()->route('operator');
            }
        }
        return redirect()->back()->with('Message','Login Gagal!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('beranda')->with('Message','Logout Berhasil!');
    }
}
