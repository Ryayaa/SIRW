<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->roles == 'rw') {
                return redirect()->route('rw-dashboard');
            } elseif ($user->roles == 'rt') {
                return redirect()->route('rt-dashboard');
            } elseif ($user->roles == 'warga') {
                return redirect()->route('user-dashboard');
            }
            // Jika rolenya tidak cocok dengan yang diharapkan, maka tetapkan pengguna untuk logout
            Auth::logout();
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
                return redirect()->route('rw-dashboard');
            } elseif ($user->roles == 'rt') {
                return redirect()->route('rt-dashboard');
            } elseif ($user->roles == 'warga') {
                return redirect()->route('user-dashboard');
            }
        }

        // Jika tidak berhasil login, kembali ke halaman login dengan pesan error
        return redirect()->route('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan NIK dan password yang dimasukkan sudah benar']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function showProfile()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile-user.index', compact('user'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Memastikan password saat ini benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak benar']);
        }

        // Mengubah password pengguna
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('status', 'Password berhasil diubah');
    }

}
