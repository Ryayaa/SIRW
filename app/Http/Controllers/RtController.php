<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RtModel;
use Yajra\DataTables\Facades\DataTables;

class RtController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Ketua RT',
            'list' => ['Home', 'RT']
        ];
        $page = (object) [
            'title' => 'Ketua RT yang terdaftar pada sistem',
        ];
        $activeMenu = 'rt';

        return view('rt.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $rt = RtModel::findOrFail($id);

        // Membuat objek breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail Ketua RT',
            'list' => ['Home', 'RT', 'Detail']
        ];

        // Membuat objek page
        $page = (object) [
            'title' => 'Detail Ketua RT'
        ];

        // Menentukan active menu
        $activeMenu = 'rt';

        // Mengirim data ke view
        return view('rt.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rt' => $rt,
            'activeMenu' => $activeMenu
        ]);
    }


    public function list(Request $request)
    {
        $rt = RtModel::select('id_rt','no_rt', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'no_telepon', 'status', 'mulai_jabatan', 'akhir_jabatan');

        return DataTables::of($rt)
            ->addIndexColumn()
            ->addColumn('aksi', function ($rt) {
                $btn = '<a href="' . url('/rt/' . $rt->id_rt) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/rt/' . $rt->id_rt . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/rt/' . $rt->id_rt) . '">'
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
            'title' => 'Tambah Ketua RT',
            'list' => ['Home', 'RT', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Ketua RT Baru',
        ];

        $activeMenu = 'rt';

        return view('rt.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rt' => 'required',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required',
        ]);

        RtModel::where('status', 'Aktif')
        ->where('no_rt', $request->no_rt)
        ->update(['status' => 'Pensiun', 'akhir_jabatan' => now()]);

        RtModel::create([
            'no_rt' => $request->no_rt,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'status' => 'Aktif',
            'mulai_jabatan' => now(),
        ]);

        return redirect('/rt')->with('success', 'Data ketua RT baru telah ditambahkan');
    }

    public function edit(string $id){
        $rt = RtModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Ketua RT',
            'list' => ['Home', 'RT', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Ketua RT'
        ];

        $activeMenu = 'rt';

        return view('rt.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rt' => $rt,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'no_rt' => 'required',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required',
        ]);

        RtModel::find($id)->update([
            'no_rt' => $request->no_rt,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect('/rt')->with('success', 'Data RT berhasil diubah');
    }

    public function destroy(string $id){
        $check = RtModel::find($id);
        if (!$check){
            return redirect('/rt')->with('error', 'Data rt tidak ditemukan');
        }

        try{
            RtModel::destroy($id);

            return redirect('/rt')->with('success', 'Data RT berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/rt')->with('error', 'Data RT gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
