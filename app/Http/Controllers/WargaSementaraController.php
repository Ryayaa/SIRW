<?php

namespace App\Http\Controllers;

use App\Models\WargaSementaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WargaSementaraController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Warga Sementara',
            'list' => ['Home', 'Warga Sementara']
        ];
        $page = (object) [
            'title' => 'Daftar Warga Sementara',
        ];
        $activeMenu = 'warga-sementara';

        return view('warga_sementara.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $wargaSementara = WargaSementaraModel::select('id_warga_sementara', 'nama_lengkap', 'tanggal_lahir', 'jenis_kelamin', 'alamat_asal', 'alamat_domisili', 'pekerjaan', 'status_perkawinan', 'tanggal_masuk');

        return DataTables::of($wargaSementara)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargaSementara) {
                $btn = '<a href="' . url('/warga-sementara/' . $wargaSementara->id_warga_sementara) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/warga-sementara/' . $wargaSementara->id_warga_sementara . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('warga-sementara.destroy', $wargaSementara->id_warga_sementara) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga Sementara',
            'list' => ['Home', 'Warga Sementara', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Warga Sementara'
        ];

        $activeMenu = 'warga-sementara';

        return view('warga_sementara.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_asal' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($request->hasFile('bukti_ktp')) 
        {
            $imageName = time() . '.' . $request->bukti_ktp->getClientOriginalExtension();
            $request->bukti_ktp->move(public_path('images'), $imageName);
            $data['bukti_ktp'] = $imageName;
        }

        WargaSementaraModel::create($data);

        return redirect('/warga-sementara')->with('success', 'Data warga sementara berhasil disimpan');
    }

    public function edit(string $id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Warga Sementara',
            'list' => ['Home', 'Warga Sementara', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Warga Sementara'
        ];

        $activeMenu = 'warga-sementara';

        return view('warga_sementara.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'wargaSementara' => $wargaSementara,
            'activeMenu' => $activeMenu
        ]);
    }

    public function show($id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Warga Sementara',
            'list' => ['Home', 'Warga Sementara', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Warga Sementara'
        ];

        $activeMenu = 'warga-sementara';

        return view('warga_sementara.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'wargaSementara' => $wargaSementara, 'activeMenu' => $activeMenu]);
    }

    public function destroy($id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        if ($wargaSementara->delete()) {
            return redirect()->route('warga-sementara.index')->with('success', 'Data warga sementara berhasil dihapus.');
        } else {
            return redirect()->route('warga-sementara.index')->with('error', 'Gagal menghapus data warga sementara.');
        }
    }
}
