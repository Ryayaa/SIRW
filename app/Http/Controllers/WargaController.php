<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WargaModel;
use App\Http\Requests\StorePostRequest;
use App\Models\Warga;
use App\Models\KeluargaModel;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Warga',
            'list' => ['Home', 'Warga']
        ];
        $page = (object) [
            'title' => 'Daftar Warga yang terdaftar pada sistem',
        ];
        $activeMenu = 'warga';
        $keluarga = KeluargaModel::all();

        return view('warga.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'keluarga' => $keluarga
        ]);
    }

    public function show($id){
    // Mengambil data warga berdasarkan ID
    $warga = Warga::findOrFail($id);

    // Membuat objek breadcrumb
    $breadcrumb = (object) [
        'title' => 'Detail Warga',
        'list' => ['Home', 'Warga', 'Detail']
    ];

    // Membuat objek page
    $page = (object) [
        'title' => 'Detail Warga'
    ];

    // Menentukan active menu
    $activeMenu = 'warga';

    // Mengirim data ke view
    return view('warga.show', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'warga' => $warga,
        'activeMenu' => $activeMenu
    ]);
}


    public function list(Request $request)
    {
        $warga = WargaModel::select('id_warga', 'NIK', 'nama_lengkap', 'tanggal_lahir', 'jenis_kelamin', 'alamat_domisili', 'pekerjaan', 'status_perkawinan','roles', 'id_keluarga')
            ->with('keluarga');

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . url('/warga/' . $warga->id_warga) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/warga/' . $warga->id_warga . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/warga/' . $warga->id_warga) . '">'
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
            'title' => 'Tambah Warga',
            'list' => ['Home', 'Warga', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Warga Baru',
        ];

        $keluarga = KeluargaModel::all();
        $activeMenu = 'warga';

        return view('warga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'keluarga' => $keluarga
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin',
            'roles' => 'required|in:RT,RW,Warga,Warga Sementara',
            'password' => 'required|min:5',
            'id_keluarga' => 'required|integer',
        ]);

        WargaModel::create([
            'NIK' => $request->NIK,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_domisili' => $request->alamat_domisili,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'roles' => $request->roles,
            'password' => bcrypt($request->password),
            'id_keluarga' => $request->id_keluarga,
        ]);

        return redirect('/warga')->with('success', 'Data warga baru telah ditambahkan');
    }

    public function edit(string $id){
        $warga = WargaModel::find($id);
        $keluarga = KeluargaModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => ['Home', 'Warga', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Warga'
        ];

        $activeMenu = 'warga';

        return view('warga.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'warga' => $warga,
            'activeMenu' => $activeMenu,
            'keluarga' => $keluarga
        ]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'NIK' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin',
            'roles' => 'required|in:RT,RW,Warga,Warga Sementara',
            'password' => 'required|min:5',
            'id_keluarga' => 'required|integer',
        ]);

        WargaModel::find($id)->update([
            'NIK' => $request->NIK,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_domisili' => $request->alamat_domisili,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'roles' => $request->roles,
            'password' => bcrypt($request->password),
            'id_keluarga' => $request->id_keluarga,
        ]);

        return redirect('/warga')->with('success', 'Data warga berhasil diubah');
    }

    public function destroy(string $id){
        $check = WargaModel::find($id);
        if (!$check){    // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/warga')->with('error', 'Data warga tidak ditemukan');
        }

        try{
            WargaModel::destroy($id);

            return redirect('/warga')->with('success', 'Data warga berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/warga')->with('error', 'Data warga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
