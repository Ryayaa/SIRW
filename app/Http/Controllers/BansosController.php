<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\KriteriaBansosModel;
use App\Models\NilaiKriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Bantuan Sosial',
            'list' => ['Home', 'Bantuan Sosial']
        ];
        $page = (object) [
            'title' => 'Daftar Bantuan Sosial',
        ];
        $activeMenu = 'bansos';
        $bansosList = Bansos::all();

        return view('bansos.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'bansosList' => $bansosList
        ]);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Bansos',
            'list'  => ['Home', 'Bansos', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Bantuan Sosial'
        ];

        $activeMenu = 'bansos';

        return view('bansos.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bansos' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|max:2048',
            'jumlah_kriteria' => 'required|integer|min:1',
        ]);

        $bansos = Bansos::create([
            'nama_bansos' => $request->nama_bansos,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->file('gambar')->store('images', 'public')
        ]);

        return redirect()->route('bansos.createKriteria', ['id_bansos' => $bansos->id_bansos, 'jumlah_kriteria' => $request->jumlah_kriteria]);
    }

    public function createKriteria(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Bansos',
            'list'  => ['Home', 'Bansos', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Bantuan Sosial'
        ];

        $activeMenu = 'bansos';
        $id_bansos = $request->query('id_bansos');
        $jumlah_kriteria = $request->query('jumlah_kriteria');

        return view('bansos.create_kriteria', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'activeMenu' => $activeMenu,
            'id_bansos' => $id_bansos,
            'jumlah_kriteria' => $jumlah_kriteria
        ]);
    }

    public function storeKriteria(Request $request)
    {
        
        $request->validate([
            'id_bansos' => 'required|exists:bansos,id_bansos',
            'kriteria.*.nama' => 'required|string|max:255',
            'kriteria.*.bobot' => 'required|numeric|min:0',
            'kriteria.*.jenis' => 'required|string|in:Benefit,Cost',
            'kriteria.*.subkriteria.*' => 'required|string|max:255',
            'kriteria.*.nilai.*' => 'required|numeric|min:0',
        ]);

        $id_bansos = $request->input('id_bansos');
        $kriteriaList = $request->input('kriteria');

        foreach ($kriteriaList as $kriteriaData) {
            $kriteria = KriteriaBansosModel::create([
                'id_bansos' => $id_bansos,
                'nama' => $kriteriaData['nama'],
                'bobot' => $kriteriaData['bobot'],
                'jenis' => $kriteriaData['jenis'],
            ]);

            foreach ($kriteriaData['subkriteria'] as $index => $subkriteria) {
                NilaiKriteriaModel::create([
                    'id_kriteria' => $kriteria->id_kriteria,
                    'subkriteria' => $subkriteria,
                    'nilai' => $kriteriaData['nilai'][$index],
                ]);
            }
        }

        return redirect()->route('bansos.index')->with('success', 'Bantuan sosial dan kriteria berhasil disimpan');
    }

    public function show($id)
    {
        $bansos = Bansos::with(['kriteria', 'kriteria.subkriteria'])->findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Bansos',
            'list'  => ['Home', 'Bansos', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Bantuan Sosial'
        ];

        $activeMenu = 'bansos';

        return view('bansos.show', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'bansos' => $bansos, 
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id_bansos)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Bansos',
            'list'  => ['Home', 'Bansos', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Bantuan Sosial'
        ];

        $activeMenu = 'bansos';
        $bansos = Bansos::with('kriteria.subkriteria')->find($id_bansos);
        if (!$bansos) {
            return redirect()->route('bansos.index')->with('error', 'Bantuan sosial tidak ditemukan');
        }
        return view('bansos.edit', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'bansos' => $bansos, 
            'activeMenu' => $activeMenu
        ]);
    }
    
    public function update(Request $request, $id_bansos)
    {
        $request->validate([
            'nama_bansos' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kriteria' => 'required|array',
            'kriteria.*.nama' => 'required|string|max:255',
            'kriteria.*.bobot' => 'required|numeric|min:0',
            'kriteria.*.jenis' => 'required|in:Benefit,Cost',
            'kriteria.*.subkriteria' => 'required|array',
            'kriteria.*.subkriteria.*' => 'required|string|max:255',
            'kriteria.*.nilai' => 'required|array',
            'kriteria.*.nilai.*' => 'required|numeric|min:0',
        ]);
    
        $bansos = Bansos::find($id_bansos);
        if (!$bansos) {
            return redirect()->route('bansos.index')->with('error', 'Bantuan sosial tidak ditemukan');
        }
    
        $bansos->update([
            'nama_bansos' => $request->input('nama_bansos'),
            'deskripsi' => $request->input('deskripsi'),
        ]);
    
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('bansos_images', 'public');
            $bansos->update(['gambar' => $imagePath]);
        }
    
        foreach ($request->input('kriteria') as $kriteriaId => $kriteriaData) {
            $kriteria = KriteriaBansosModel::find($kriteriaId);
            if ($kriteria) {
                $kriteria->update([
                    'nama' => $kriteriaData['nama'],
                    'bobot' => $kriteriaData['bobot'],
                    'jenis' => $kriteriaData['jenis'],
                ]);
    
                foreach ($kriteriaData['subkriteria'] as $subkriteriaIndex => $subkriteriaNama) {
                    $nilaiKriteria = $kriteria->subkriteria->get($subkriteriaIndex);
                    if ($nilaiKriteria) {
                        $nilaiKriteria->update([
                            'subkriteria' => $subkriteriaNama,
                            'nilai' => $kriteriaData['nilai'][$subkriteriaIndex],
                        ]);
                    }
                }
            }
        }
    
        return redirect()->route('bansos.index')->with('success', 'Bantuan sosial berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $bansos = Bansos::findOrFail($id);

        // Check if the bansos entry has an associated image and delete it
        if ($bansos->gambar && file_exists(public_path('images/' . $bansos->gambar))) {
            unlink(public_path('images/' . $bansos->gambar));
        }

        // Delete the bansos entry from the database
        if ($bansos->delete()) {
            return redirect()->route('bansos.index')->with('success', 'Bansos successfully deleted.');
        } else {
            return redirect()->route('bansos.index')->with('error', 'Failed to delete Bansos.');
        }
    }
}
