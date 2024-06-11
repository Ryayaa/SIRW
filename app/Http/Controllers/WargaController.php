<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WargaModel;
use App\Http\Requests\StorePostRequest;
use App\Models\KeluargaModel;
use App\Models\WargaSementaraModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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

        return view('Warga.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $warga = WargaSementaraModel::findOrFail($id);

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
        $warga = WargaSementaraModel::all();

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . url('/warga/' . $warga->id_warga_sementara) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/warga/' . $warga->id_warga_sementara . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
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
            'bukti_ktp' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'nik' => 'required|string|max:16|unique:warga_sementara,nik',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Mati,Cerai Hidup',
            'no_telepon' => 'required|string|max:15',
            'agama' => 'required|string|max:20',
        ]);
    
        $validatedData = $request->all();
        if ($request->hasFile('bukti_ktp')) {
            $file = $request->file('bukti_ktp');
            $fileName = $request->nik . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('images/warga_sementara'))) {
                mkdir(public_path('images/warga_sementara'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/warga_sementara'), $fileName);
            $validatedData['bukti_ktp'] = 'warga_sementara/' . $fileName;
        }
        $validatedData['pengaju'] = Auth::user()->nik;
        $validatedData['status'] = 'diterima';
    
        // Insert data into WargaSementaraModel
        WargaSementaraModel::create($validatedData);
    
        // Insert data into WargaModel
        WargaModel::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_domisili' => $request->alamat_domisili,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'no_telepon' => $request->no_telepon,
            'roles' => 'warga sementara',
            'password' => Hash::make($request->nik),
            'username' => $request->nik,
            'bukti_ktp' => $validatedData['bukti_ktp'],
            'agama' => $request->agama,
        ]);
    
        return redirect()->route('warga.index')->with('success', 'Pengajuan data warga sementara berhasil disimpan.');
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

    public function accept($id)
    {
        $wargaSementara = WargaSementaraModel::find($id);
        if ($wargaSementara) {
            $warga = new WargaModel();
            $warga->nik = $wargaSementara->nik;
            $warga->nama_lengkap = $wargaSementara->nama_lengkap;
            $warga->tanggal_lahir = $wargaSementara->tanggal_lahir;
            $warga->tempat_lahir = $wargaSementara->tempat_lahir;
            $warga->jenis_kelamin = $wargaSementara->jenis_kelamin;
            $warga->alamat_domisili = $wargaSementara->alamat_domisili;
            $warga->pekerjaan = $wargaSementara->pekerjaan;
            $warga->status_perkawinan = $wargaSementara->status_perkawinan;
            $warga->no_telepon = $wargaSementara->no_telepon;
            $warga->bukti_ktp = $wargaSementara->bukti_ktp;
            $warga->roles = 'warga sementara';
            $warga->password = Hash::make($wargaSementara->nik);
            $warga->username = $wargaSementara->nik;
            $warga->agama = $wargaSementara->agama;
            $warga->save();

            $wargaSementara->status = 'diterima';
            $wargaSementara->save();
        }

        return redirect(url('warga/'))->with('success', 'Penerima berhasil diterima');
    }

    public function reject($id)
    {
        $wargaSementara = WargaSementaraModel::find($id);
        if ($wargaSementara) {
            $wargaSementara->status = 'ditolak';
            $wargaSementara->save();
        }

        return redirect(url('warga/'))->with('success', 'Penerima berhasil ditolak');
    }
}
