<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWargaModel;

class KategoriWargaController extends Controller
{
    public function index()
    {
        $kategoriWargas = KategoriWargaModel::all();
        return view('kategori_warga.index', compact('kategoriWargas'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan data kategori warga
        return view('kategori_warga.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            // Atur rules validasi sesuai kebutuhan
        ]);

        // Simpan data kategori warga baru ke dalam database
        KategoriWargaModel::create($request->all());

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kategori_warga.index')->with('success', 'Data kategori warga berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Tampilkan detail data kategori warga dengan ID tertentu
        $kategoriWarga = KategoriWargaModel::findOrFail($id);
        return view('kategori_warga.show', compact('kategoriWarga'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit data kategori warga dengan ID tertentu
        $kategoriWarga = KategoriWargaModel::findOrFail($id);
        return view('kategori_warga.edit', compact('kategoriWarga'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            // Atur rules validasi sesuai kebutuhan
        ]);

        // Perbarui data kategori warga yang sudah ada
        KategoriWargaModel::findOrFail($id)->update($request->all());

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kategori_warga.index')->with('success', 'Data kategori warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data kategori warga dengan ID tertentu
        KategoriWargaModel::findOrFail($id)->delete();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kategori_warga.index')->with('success', 'Data kategori warga berhasil dihapus.');
    }
}
