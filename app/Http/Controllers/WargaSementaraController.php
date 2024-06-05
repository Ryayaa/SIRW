<?php

namespace App\Http\Controllers;

use App\Models\WargaSementaraModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

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
        $activeMenu = 'warga_sementara';

        return view('warga_sementara.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $wargaSementara = WargaSementaraModel::select('id_warga_sementara', 'nama_lengkap', 'nik', 'bukti_ktp');

        return DataTables::of($wargaSementara)
            ->addIndexColumn()
            ->addColumn('aksi', function ($wargaSementara) {
                $btn = '<a href="' . url('/warga_sementara/' . $wargaSementara->id_warga_sementara) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/warga_sementara/' . $wargaSementara->id_warga_sementara . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/warga_sementara/' . $wargaSementara->id_warga_sementara) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Warga Sementara',
            'list'  => ['Home', 'Warga Sementara', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Warga Sementara'
        ];

        $activeMenu = 'warga_sementara';

        return view('warga_sementara.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:20|unique:warga_sementara,nik',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_asal' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Mati,Cerai Hidup',
            'tanggal_masuk' => 'required|date',
            'password' => 'required|string|min:8',
            'bukti_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_ktp')) {
            $imageName = time() . '.' . $request->bukti_ktp->extension();
            $request->bukti_ktp->move(public_path('images'), $imageName);
            $data['bukti_ktp'] = $imageName;
        }

        $data['password'] = bcrypt($data['password']);
        $data['status_pengajuan'] = 'pending';
        $data['id_warga'] = Auth::user()->id_warga;
        $data['username'] = $this->generateUsername($data['nama_lengkap']);

        WargaSementaraModel::create($data);

        return redirect('/warga_sementara')->with('success', 'Warga Sementara berhasil disimpan');
    }

    public function show($id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Warga Sementara',
            'list'  => ['Home', 'Warga Sementara', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Warga Sementara'
        ];

        $activeMenu = 'warga_sementara';

        return view('warga_sementara.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'wargaSementara' => $wargaSementara, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Warga Sementara',
            'list' => ['Home', 'Warga Sementara', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Warga Sementara'
        ];

        $activeMenu = 'warga_sementara';

        return view('warga_sementara.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'wargaSementara' => $wargaSementara,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:20|unique:warga_sementara,nik,' . $id . ',id_warga_sementara',
            'nama_lengkap' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_asal' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Mati,Cerai Hidup',
            'tanggal_masuk' => 'required|date',
            'password' => 'nullable|string|min:8',
            'bukti_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $wargaSementara = WargaSementaraModel::findOrFail($id);

        $wargaSementara->nik = $request->input('nik');
        $wargaSementara->nama_lengkap = $request->input('nama_lengkap');
        $wargaSementara->tanggal_lahir = $request->input('tanggal_lahir');
        $wargaSementara->jenis_kelamin = $request->input('jenis_kelamin');
        $wargaSementara->alamat_asal = $request->input('alamat_asal');
        $wargaSementara->alamat_domisili = $request->input('alamat_domisili');
        $wargaSementara->pekerjaan = $request->input('pekerjaan');
        $wargaSementara->status_perkawinan = $request->input('status_perkawinan');
        $wargaSementara->tanggal_masuk = $request->input('tanggal_masuk');
        $wargaSementara->status_pengajuan = 'pending';
        $wargaSementara->id_warga = Auth::user()->id_warga;
        $wargaSementara->username = $this->generateUsername($request->input('nama_lengkap'));

        if ($request->filled('password')) {
            $wargaSementara->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('bukti_ktp')) {
            if ($wargaSementara->bukti_ktp && file_exists(public_path('images/' . $wargaSementara->bukti_ktp))) {
                unlink(public_path('images/' . $wargaSementara->bukti_ktp));
            }

            $imageName = time() . '.' . $request->bukti_ktp->extension();
            $request->bukti_ktp->move(public_path('images'), $imageName);
            $wargaSementara->bukti_ktp = $imageName;
        }

        $wargaSementara->save();

        return redirect()->route('warga_sementara.index')->with('success', 'Warga Sementara berhasil diupdate.');
    }

    public function destroy($id)
    {
        $wargaSementara = WargaSementaraModel::findOrFail($id);

        if ($wargaSementara->bukti_ktp && file_exists(public_path('images/' . $wargaSementara->bukti_ktp))) {
            unlink(public_path('images/' . $wargaSementara->bukti_ktp));
        }

        if ($wargaSementara->delete()) {
            return redirect()->route('warga_sementara.index')->with('success', 'Warga Sementara berhasil dihapus.');
        } else {
            return redirect()->route('warga_sementara.index')->with('error', 'Gagal menghapus Warga Sementara.');
        }
    }

    private function generateUsername($nama_lengkap)
    {
        // Example username generation from the full name
        $username = strtolower(str_replace(' ', '.', $nama_lengkap));
        $count = WargaSementaraModel::where('username', 'like', $username . '%')->count();
        if ($count > 0) {
            $username .= ($count + 1);
        }
        return $username;
    }
}

