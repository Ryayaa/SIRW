<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TamuController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Tamu',
            'list' => ['Home', 'Tamu']
        ];
        $page = (object) [
            'title' => 'Daftar Tamu',
        ];
        $activeMenu = 'tamu';

        return view('Tamu.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $tamu = Tamu::select('id_tamu', 'nama_lengkap');

        return DataTables::of($tamu)
            ->addIndexColumn()
            ->addColumn('aksi', function ($tamu) {
                $btn = '<a href="' . url('/tamu/' . $tamu->id_tamu) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/tamu/' . $tamu->id_tamu . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('tamu.destroy', $tamu->id_tamu) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Tamu',
            'list' => ['Home', 'Tamu', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Tamu'
        ];

        $activeMenu = 'tamu';

        return view('Tamu.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_menetap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'bukti_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_ktp')) {
            $imageName = time() . '.' . $request->bukti_ktp->extension();
            $request->bukti_ktp->move(public_path('images/tamu'), $imageName);
            $data['bukti_ktp'] = $imageName;
        }

        Tamu::create($data);

        return redirect('/tamu')->with('success', 'Data tamu berhasil disimpan');
    }

    public function show($id)
    {
        $tamu = Tamu::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Tamu',
            'list' => ['Home', 'Tamu', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Tamu'
        ];

        $activeMenu = 'tamu';

        return view('Tamu.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'tamu' => $tamu,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $tamu = Tamu::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Tamu',
            'list' => ['Home', 'Tamu', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Tamu'
        ];

        $activeMenu = 'tamu';

        return view('Tamu.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'tamu' => $tamu,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_menetap' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
            'bukti_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tamu = Tamu::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('bukti_ktp')) {
            $imageName = time() . '.' . $request->bukti_ktp->extension();
            if (!file_exists(public_path('images/tamu/'))) {
                mkdir(public_path('images/tamu/'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/tamu/'), $imageName);
            $data['bukti_ktp'] = $imageName;

            // Delete old image if exists
            if ($tamu->bukti_ktp && file_exists(public_path('images/tamu/' . $tamu->bukti_ktp))) {
                unlink(public_path('images/tamu/' . $tamu->bukti_ktp));
            }
        }

        $tamu->update($data);

        return redirect('/tamu')->with('success', 'Data tamu berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);

        if ($tamu->bukti_ktp && file_exists(public_path('images/tamu/' . $tamu->bukti_ktp))) {
            unlink(public_path('images/tamu/' . $tamu->bukti_ktp));
        }

        if ($tamu->delete()) {
            return redirect('/tamu')->with('success', 'Data tamu berhasil dihapus.');
        } else {
            return redirect('/tamu')->with('error', 'Gagal menghapus data tamu.');
        }
    }
}
