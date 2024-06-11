<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WargaModel;
use App\Http\Requests\StorePostRequest;
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

        return view('Warga.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'keluarga' => $keluarga
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $warga = WargaModel::findOrFail($id);

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
        return view('Warga.show', [
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

        return view('Warga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'keluarga' => $keluarga
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:1',
            'alamat_domisili' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_perkawinan' => 'required|string',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'no_telepon' => 'required|string',
            'tempat_lahir' => 'required|string',
            'status_hubungan' => 'required|string',
            'bukti_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['roles'] = 'warga';
        $data['password'] = bcrypt($request->nik);
        $data['username'] = $request->nik;

        if ($request->hasFile('bukti_ktp')) {
            $extension = $request->bukti_ktp->extension();
            $imageName = $request->nik.'.'.$extension;
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/warga/ktp'))) {
                mkdir(public_path('images/warga/ktp'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/warga/ktp'), $imageName);
            $data['bukti_ktp'] = $imageName;
        }

        $data['password'] = bcrypt($request->password);

        WargaModel::create($data);

        return redirect('/warga')->with('success', 'Warga berhasil ditambahkan');
    }

    public function edit($id)
    {
        $warga = WargaModel::findOrFail($id);
        $keluarga = KeluargaModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => ['Home', 'Warga', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Data Warga',
        ];

        return view('warga.edit', compact('warga', 'breadcrumb', 'page', 'keluarga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:20',
            'username' => 'required|string|max:50',
            'no_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:50',
            'status_hubungan' => 'required|string|max:50',
            'id_keluarga' => 'required',
            'bukti_ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'password']);
        $data['roles'] = 'warga'; // Ensure 'roles' is always set to 'warga'

        if ($request->hasFile('bukti_ktp')) {
            $extension = $request->bukti_ktp->extension();
            $imageName = $request->nik.'.'.$extension;
            if (!file_exists(public_path('images/warga/ktp'))) {
                mkdir(public_path('images/warga/ktp'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/warga/ktp'), $imageName);
            $data['bukti_ktp'] = $imageName;
        }

        WargaModel::where('id_warga', $id)->update($data);

        return redirect()->route('warga.show', $id)->with('success', 'Data Warga telah diperbarui');
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
