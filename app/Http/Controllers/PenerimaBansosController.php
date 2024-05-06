<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenerimaBansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Daftar Warga yang menerima bantuan sosial',
        ];
        $activeMenu = 'penerima';

        return view('penerima.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $penerima = PenerimaBansosModel::select('id_penerima_bansos','id_warga')
            ->with('warga');

        if ($request->id_warga) {
            $penerima->where('id_warga', $request->id_warga);
        }

        return DataTables::of($penerima)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($penerima) { 
                $btn = '<a href="' . url('/penerima/' . $penerima->id_penerima_bansos) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penerima/' . $penerima->id_penerima_bansos . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penerima/' . $penerima->id_penerima_bansos) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Penerima Bansos',
            'list'  => ['Home', 'Penerima', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah penerima bansos'
        ];

        $warga = WargaModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'penerima'; // set menu sedang aktif

        return view('penerima.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'warga' => $warga, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data user baru
    public function store(Request $request){
        $request->validate([
            'id_warga' => 'required'         // level_id harus diisi dan berupa angka
        ]);

        PenerimaBansosModel::create([
            'id_warga' => $request->id_warga,
        ]);

        return redirect('/penerima')->with('success', 'Data penerima berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id){
        $penerima = PenerimaBansosModel::with('warga')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail penerima',
            'list'  => ['Home', 'Penerima', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail baru'
        ];

        $activeMenu = 'penerima'; // set menu yang sedang aktif

        return view('penerima.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerima' => $penerima, 'activeMenu' => $activeMenu]);
    }
}
