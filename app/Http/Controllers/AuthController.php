<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->roles == 'rw') {
                return redirect()->intended('rt');
            } else if ($user->roles == 'rt') {
                return redirect()->intended('rw');
            } else if ($user->roles == 'warga') {
                return redirect()->intended('warga');
            // } else if ($user->roles == 'warga sementara') {
            //     return redirect()->intended('warga sementara');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('nik', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            if ($user->roles == 'rw') {
                return redirect()->intended('rw-dashboard');
            } else if ($user->roles == 'rt') {
                return redirect()->intended('rt-dashboard');
            } else if ($user->roles == 'warga') {
                return redirect()->intended('warga-dashboard');
            // } else if ($user->roles == 'warga sementara') {
            //     return redirect()->intended('warga sementara');
            }
            return redirect()->route('login');
        }

        return redirect()->route('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali NIK dan password yang dimasukkan sudah benar']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect()->route('login');
    }
}
