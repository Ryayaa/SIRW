<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use App\Models\RtModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeluargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Keluarga',
            'list' => ['Home', 'keluarga']
        ];
        $page = (object) [
            'title' => 'Keluarga yang terdaftar pada sistem',
        ];
        $activeMenu = 'keluarga';

        $rt = RtModel::all();

        return view('keluarga.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $keluarga = KeluargaModel::with('rt')->findOrFail($id);

        // Membuat objek breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail Ketua Keluarga',
            'list' => ['Home', 'Keluarga', 'Detail']
        ];

        // Membuat objek page
        $page = (object) [
            'title' => 'Detail Keluarga'
        ];

        // Menentukan active menu
        $activeMenu = 'keluarga';

        // Mengirim data ke view
        return view('keluarga.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'keluarga' => $keluarga,
            'activeMenu' => $activeMenu,
        ]);
    }


    public function list(Request $request)
    {
        $keluarga = KeluargaModel::select('id_keluarga','nomor_kk', 'alamat', 'id_rt')
            ->with('rt');

        return DataTables::of($keluarga)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($keluarga) { 
                $btn = '<a href="' . url('/keluarga/' . $keluarga->id_keluarga) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/keluarga/' . $keluarga->id_keluarga . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/keluarga/' . $keluarga->id_keluarga) . '">'
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
            'title' => 'Tambah Keluarga',
            'list' => ['Home', 'Keluarga', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Keluarga Baru',
        ];

        $rt = RtModel::all();
        $activeMenu = 'keluarga';

        return view('keluarga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kk' => 'required',
            'alamat' => 'required|string|max:255',
            'id_rt' => 'required',
        ]);

        KeluargaModel::create([
            'nomor_kk' => $request->nomor_kk,
            'alamat' => $request->alamat,
            'id_rt' => $request->id_rt,
        ]);

        return redirect('/keluarga')->with('success', 'Data Keluarga baru telah ditambahkan');
    }

    public function edit(string $id){
        $keluarga = KeluargaModel::find($id);
        $rt = RtModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Keluarga',
            'list' => ['Home', 'Keluarga', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Keluarga'
        ];

        $activeMenu = 'keluarga';

        return view('keluarga.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'keluarga' => $keluarga,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'nomor_kk' => 'required',
            'alamat' => 'required|string|max:255',
            'id_rt' => 'required',
        ]);

        KeluargaModel::find($id)->update([
            'nomor_kk' => $request->nomor_kk,
            'alamat' => $request->alamat,
            'id_rt' => $request->id_rt,
        ]);

        return redirect('/keluarga')->with('success', 'Data keluarga berhasil diubah');
    }

    public function destroy(string $id){
        $check = KeluargaModel::find($id);
        if (!$check){
            return redirect('/keluarga')->with('error', 'Data keluarga tidak ditemukan');
        }

        try{
            KeluargaModel::destroy($id);

            return redirect('/keluarga')->with('success', 'Data Keluarga berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/keluarga')->with('error', 'Data Keluarga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
