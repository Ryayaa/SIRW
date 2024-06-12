<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratModel;
use App\Models\WargaModel;
use App\Models\JenisSuratModel;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Surat Pengantar',
            'list' => ['Home', 'Surat Pengantar']
        ];
        $page = (object) [
            'title' => 'Daftar Surat Pengantar yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'surat_pengantar';
        $warga = WargaModel::all();
        $jenisSurat = JenisSuratModel::all();

        return view('surat.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'warga' => $warga,
            'jenisSurat' => $jenisSurat,
        ]);
    }

    public function list(Request $request)
    {
        $surat = SuratModel::with('warga', 'jenisSurat')->select('id_surat_pengantar', 'tanggal', 'keterangan', 'id_warga', 'id_jenis_surat');

        return DataTables::of($surat)
            ->addIndexColumn()
            ->addColumn('nama_warga', function ($surat) {
                return $surat->warga->nama_lengkap ?? '';
            })
            ->addColumn('nama_jenis', function ($surat) {
                return $surat->jenisSurat->nama_jenis ?? '';
            })
            ->addColumn('aksi', function ($surat) {
                $btn = '<form class="d-inline-block" method="POST" action="' . route('surat.destroy', $surat->id_surat_pengantar) . '">'
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
            'title' => 'Tambah Surat Pengantar',
            'list' => ['Home', 'Surat Pengantar', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Surat Pengantar'
        ];

        $activeMenu = 'surat_pengantar';
        $warga = WargaModel::all();
        $jenisSurat = JenisSuratModel::all();

        return view('surat.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'warga' => $warga,
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'date',
        'keterangan' => 'nullable|string',
        'id_warga' => 'required|integer',
        'id_jenis_surat' => 'required|integer',
    ]);

    $data = $request->all();

    // Set today's date if the tanggal field is not provided
    if (empty($data['tanggal'])) {
        $data['tanggal'] = date('Y-m-d');
    }

    SuratModel::create($data);

    return redirect()->route('surat.index')->with('success', 'Surat Pengantar baru telah ditambahkan');
}


    public function destroy($id)
    {
        $surat = SuratModel::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat Pengantar berhasil dihapus');
    }
}
