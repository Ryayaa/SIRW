<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use App\Models\RtModel;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kegiatan',
            'list' => ['Home', 'Kegiatan']
        ];
        $page = (object) [
            'title' => 'Daftar Kegiatan yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'kegiatan';
        $rt = RtModel::all();

        return view('Kegiatan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function list(Request $request)
    {
        $kegiatan = KegiatanModel::select('id_kegiatan_warga', 'nama_kegiatan', 'deskripsi', 'lokasi', 'tanggal', 'waktu', 'id_rt')
            ->with('rt');

        return DataTables::of($kegiatan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kegiatan) {
                $btn = '<a href="' . route('kegiatan.show', $kegiatan->id_kegiatan_warga) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . route('kegiatan.edit', $kegiatan->id_kegiatan_warga) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('kegiatan.destroy', $kegiatan->id_kegiatan_warga) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Kegiatan'
        ];

        $activeMenu = 'kegiatan';

        return view('Kegiatan.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kegiatan' => $kegiatan,
            'activeMenu' => $activeMenu
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Kegiatan Baru',
        ];

        $rt = RtModel::all();
        $activeMenu = 'kegiatan';

        return view('Kegiatan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'id_rt' => 'required|integer',
        ]);

        KegiatanModel::create($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan baru telah ditambahkan');
    }

    public function edit($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        $rt = RtModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Kegiatan'
        ];

        $activeMenu = 'kegiatan';

        return view('Kegiatan.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kegiatan' => $kegiatan,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'id_rt' => 'required|integer',
        ]);

        $kegiatan = KegiatanModel::findOrFail($id);
        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
