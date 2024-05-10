<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TamuController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Tamu',
            'list' => ['Home', 'Tamu']
        ];
        $page = (object) [
            'title' => 'Daftar Tamu',
        ];
        $activeMenu = 'tamu';

        return view('tamu.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        return DataTables::of(Tamu::query())
            ->addColumn('aksi', function ($tamu) {
                $btn = '<a href="' . route('tamu.show', $tamu->id_tamu) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('tamu.edit', $tamu->id_tamu) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('tamu.destroy', $tamu->id_tamu) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Tamu',
            'list' => ['Home', 'Tamu', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Tamu'
        ];

        $activeMenu = 'tamu';

        return view('tamu.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_menetap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
        ]);

        $data = $request->all();

        Tamu::create($data);

        return redirect('/tamu')->with('success', 'Data tamu berhasil disimpan');
    }

    public function show($id)
    {
        $tamu = Tamu::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Tamu',
            'list' => ['Home', 'Tamu', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Tamu'
        ];

        $activeMenu = 'tamu';

        return view('tamu.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'tamu' => $tamu, 'activeMenu' => $activeMenu]);
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);

        if ($tamu->delete()) {
            return redirect()->route('tamu.index')->with('success', 'Data tamu berhasil dihapus.');
        } else {
            return redirect()->route('tamu.index')->with('error', 'Gagal menghapus data tamu.');
        }
    }
}
