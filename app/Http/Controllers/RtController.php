<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RtModel;

class RtController extends Controller
{
    public function index()
    {
        $rts = RtModel::all();
        return view('rt.index', compact('rts'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan data RT
        return view('rt.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_rt' => 'required|string|unique:rt|max:45',
            'username' => 'required|string|max:45',
            'password' => 'required|string',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:45',
            'id_rw' => 'required|exists:rw,id_rw',
            // Atur rules validasi sesuai kebutuhan
        ]);

        // Simpan data RT baru ke dalam database
        RtModel::create($request->all());

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'Data RT berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Tampilkan detail data RT dengan ID tertentu
        $rt = RtModel::findOrFail($id);
        return view('rt.show', compact('rt'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data RT dengan ID tertentu
        $rt = RtModel::findOrFail($id);
        return view('rt.edit', compact('rt'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'no_rt' => 'required|string|max:45|unique:rt,no_rt,'.$id.',id_rt',
            'username' => 'required|string|max:45',
            'password' => 'required|string',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:45',
            'id_rw' => 'required|exists:rw,id_rw',
            // Atur rules validasi sesuai kebutuhan
        ]);

        // Perbarui data RT yang sudah ada
        RtModel::findOrFail($id)->update($request->all());

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'Data RT berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data RT dengan ID tertentu
        RtModel::findOrFail($id)->delete();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('rt.index')->with('success', 'Data RT berhasil dihapus.');
    }
}
