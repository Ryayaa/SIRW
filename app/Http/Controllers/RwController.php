<?php

namespace App\Http\Controllers;

use App\Models\RwModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RwController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Ketua RW',
            'list' => ['Home', 'RW']
        ];
        $page = (object) [
            'title' => 'Ketua RW yang terdaftar pada sistem',
        ];
        $activeMenu = 'rw';

        return view('rw.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $rw = RwModel::findOrFail($id);

        // Membuat objek breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail Ketua RW',
            'list' => ['Home', 'RW', 'Detail']
        ];

        // Membuat objek page
        $page = (object) [
            'title' => 'Detail Ketua RW'
        ];

        // Menentukan active menu
        $activeMenu = 'rw';

        // Mengirim data ke view
        return view('rw.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rw' => $rw,
            'activeMenu' => $activeMenu
        ]);
    }


    public function list(Request $request)
    {
        $rw = RwModel::select('id_rw', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'no_telepon', 'username', 'status', 'mulai_jabatan', 'akhir_jabatan');

        return DataTables::of($rw)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($rw) { 
                $btn = '<a href="' . url('/rw/' . $rw->id_rw) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/rw/' . $rw->id_rw . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/rw/' . $rw->id_rw) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Ketua RW',
            'list' => ['Home', 'RW', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Ketua RW Baru',
        ];

        $activeMenu = 'rw';

        return view('rw.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required',
            'username' => 'required',
            'password' => 'required|min:5',
        ]);

        RwModel::where('status', 'Aktif')->update(['status' => 'Pensiun', 'akhir_jabatan' => now()]);

        RwModel::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'username' => $request->username,
            'status' => 'Aktif',
            'mulai_jabatan' => now(),
            'password' => bcrypt($request->password),
        ]);

        return redirect('/rw')->with('success', 'Data ketua RW baru telah ditambahkan');
    }

    public function edit(string $id){
        $rw = RwModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Ketua RW',
            'list' => ['Home', 'RW', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Ketua RW'
        ];

        $activeMenu = 'rw';

        return view('rw.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rw' => $rw,
            'activeMenu' => $activeMenu
        ]);
    }
}