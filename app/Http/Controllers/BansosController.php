<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
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

        return view('Bansos.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $bansos = Bansos::select('id_bansos', 'nama_bansos', 'deskripsi', 'gambar');

        return DataTables::of($bansos)
            ->addIndexColumn()
            ->addColumn('aksi', function ($bansos) {
                $btn = '<a href="' . url('/bansos/' . $bansos->id_bansos) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/bansos/' . $bansos->id_bansos . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/bansos/' . $bansos->id_bansos) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
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

        return view('Bansos.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bansos' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        Bansos::create($data);

        return redirect('/bansos')->with('success', 'Bantuan Sosial berhasil disimpan');
    }

    public function show($id)
    {
        $bansos = Bansos::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Bansos',
            'list'  => ['Home', 'Bansos', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Bantuan Sosial'
        ];

        $activeMenu = 'bansos';

        return view('Bansos.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bansos' => $bansos, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $bansos = Bansos::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Bansos',
            'list' => ['Home', 'Bansos', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Bansos'
        ];

        $activeMenu = 'bansos';

        return view('Bansos.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'bansos' => $bansos,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bansos' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bansos = Bansos::findOrFail($id);

        // Update the bansos data
        $bansos->nama_bansos = $request->input('nama_bansos');
        $bansos->deskripsi = $request->input('deskripsi');

        // Check if a new image is uploaded
        if ($request->hasFile('gambar')) {
            // Delete the old image from storage
            if ($bansos->gambar && file_exists(public_path('images/' . $bansos->gambar))) {
                unlink(public_path('images/' . $bansos->gambar));
            }

            // Upload the new image
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $bansos->gambar = $imageName;
        }

        // Save the updated bansos
        $bansos->save();

        return redirect()->route('bansos.index')->with('success', 'Bansos successfully updated.');
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
