<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
            } elseif ($user->roles == 'warga sementara') {
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
            'login' => 'required',
            'password' => 'required'
        ]);

        $login = $request->input('login');
        $password = $request->input('password');

        // Coba login dengan NIK
        $credentialNik = ['nik' => $login, 'password' => $password];
        if (Auth::attempt($credentialNik)) {
            $user = Auth::user();
            if ($user->roles == 'rw') {
                return redirect()->route('rw-dashboard');
            } elseif ($user->roles == 'rt') {
                return redirect()->route('rt-dashboard');
            } elseif ($user->roles == 'warga'||'warga sementara') {
                return redirect()->route('user-dashboard');
            }
        }

        // Coba login dengan Username
        $credentialUsername = ['username' => $login, 'password' => $password];
        if (Auth::attempt($credentialUsername)) {
            $user = Auth::user();
            if ($user->roles == 'rw') {
                return redirect()->route('rw-dashboard');
            } elseif ($user->roles == 'rt') {
                return redirect()->route('rt-dashboard');
            } elseif ($user->roles == 'warga'||'warga sementara') {
                return redirect()->route('user-dashboard');
            }
        }

        // Jika tidak berhasil login, kembali ke halaman login dengan pesan error
        return redirect()->route('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan NIK/Username dan password yang dimasukkan sudah benar']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('LandingPage');
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
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru harus terdiri dari minimal :min karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
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

    public function changeUsername(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:12|unique:warga,username',
        'password' => 'required',
    ], [
        'username.required' => 'Username wajib diisi.',
        'username.string' => 'Username harus berupa teks.',
        'username.max' => 'Username tidak boleh lebih dari :max karakter.',
        'username.unique' => 'Username sudah digunakan.',
        'password.required' => 'Password wajib diisi.',]);

    $user = Auth::user();

    if (!Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'password' => 'Password tidak sesuai.',
        ]);
    }


    $user->username = $request->username;
    $user->save();

    return redirect()->route('profile')->with('status', 'Username berhasil diperbarui.');
}
}
