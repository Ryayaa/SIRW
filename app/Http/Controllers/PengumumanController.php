<?php
namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\RtModel; // Import model Rt
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PengumumanModel;

class PengumumanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pengumuman',
            'list' => ['Home', 'Pengumuman']
        ];
        $page = (object) [
            'title' => 'Daftar Pengumuman',
        ];
        $activeMenu = 'pengumuman';

        return view('pengumuman.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $pengumuman = PengumumanModel::select('id_pengumuman', 'judul_pengumuman', 'deskripsi', 'gambar', 'tanggal', 'id_rt');

        return DataTables::of($pengumuman)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pengumuman) {
                $btn = '<a href="' . url('/pengumuman/' . $pengumuman->id_pengumuman) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/pengumuman/' . $pengumuman->id_pengumuman . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/pengumuman/' . $pengumuman->id_pengumuman) . '">'
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
            'title' => 'Tambah Pengumuman',
            'list'  => ['Home', 'Pengumuman', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Pengumuman'
        ];

        $activeMenu = 'pengumuman';

        $rts = RtModel::all(); // Ambil semua data RT

        return view('pengumuman.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rts' => $rts // Kirim data RT ke view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'required|date',
            'id_rt' => 'required|exists:rt,id_rt'
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        PengumumanModel::create($data);

        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil disimpan');
    }

    public function show($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Pengumuman',
            'list'  => ['Home', 'Pengumuman', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Pengumuman'
        ];

        $activeMenu = 'pengumuman';

        return view('pengumuman.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'pengumuman' => $pengumuman, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit Pengumuman',
            'list'  => ['Home', 'Pengumuman', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Pengumuman'
        ];

        $activeMenu = 'pengumuman';

        $rts = RtModel::all(); // Ambil semua data RT

        return view('pengumuman.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'pengumuman' => $pengumuman,
            'activeMenu' => $activeMenu,
            'rts' => $rts // Kirim data RT ke view
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'required|date',
            'id_rt' => 'required|exists:rt,id_rt'
        ]);

        $pengumuman = PengumumanModel::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar) {
                Storage::delete('public/images/' . $pengumuman->gambar);
            }
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        $pengumuman->update($data);

        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil diupdate');
    }

    public function destroy($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);

        if ($pengumuman->gambar) {
            Storage::delete('public/images/' . $pengumuman->gambar);
        }

        if ($pengumuman->delete()) {
            return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
        } else {
            return redirect()->route('pengumuman.index')->with('error', 'Gagal menghapus Pengumuman.');
        }
    }
}
