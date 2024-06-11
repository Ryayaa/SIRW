<?php
namespace App\Http\Controllers;

use App\Models\UMKMModel;
use App\Models\WargaModel; // Import model WargaModel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UMKMController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar UMKM',
            'list' => ['Home', 'UMKM']
        ];
        $page = (object) [
            'title' => 'Daftar UMKM',
        ];
        $activeMenu = 'umkm';

        return view('UMKM.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $umkm = UMKMModel::select('id_umkm', 'nama_umkm', 'alamat', 'no_telepon', 'gambar', 'id_warga', 'status_pengajuan');

        return DataTables::of($umkm)
            ->addIndexColumn()
            ->addColumn('aksi', function ($umkm) {
                $btn = '<a href="' . url('/umkm/' . $umkm->id_umkm) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/umkm/' . $umkm->id_umkm . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/umkm/' . $umkm->id_umkm) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'no_telepon' => 'required|string|max:15',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_warga' => 'required|exists:warga,id_warga',
            'status_pengajuan' => 'required|boolean'
        ]);
    
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/umkm'))) {
                mkdir(public_path('images/umkm'), 0777, true);
            }
            $request->gambar->move(public_path('images/umkm'), $imageName);
            $data['gambar'] = 'umkm/'.$imageName;
        }
    
        UMKMModel::create($data);
    
        return redirect('/umkm')->with('success', 'UMKM berhasil disimpan');
    }

    public function show($id)
    {
        $umkm = UMKMModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail UMKM',
            'list'  => ['Home', 'UMKM', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail UMKM'
        ];

        $activeMenu = 'umkm';

        return view('UMKM.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'umkm' => $umkm, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $umkm = UMKMModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit UMKM',
            'list'  => ['Home', 'UMKM', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit UMKM'
        ];

        $activeMenu = 'umkm';

        $wargas = WargaModel::all(); // Ambil semua data WargaModel

        return view('UMKM.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'umkm' => $umkm,
            'activeMenu' => $activeMenu,
            'wargas' => $wargas // Kirim data WargaModel ke view
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'no_telepon' => 'required|string|max:15',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_warga' => 'required|exists:warga,id_warga',
            'status_pengajuan' => 'required|boolean'
        ]);

        $umkm = UMKMModel::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($umkm->gambar) {
                Storage::delete('public/images/' . $umkm->gambar);
            }
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $data['gambar'] = $imageName;
        }

        $umkm->update($data);

        return redirect('/umkm')->with('success', 'UMKM berhasil diupdate');
    }

    public function destroy($id)
    {
        $umkm = UMKMModel::findOrFail($id);

        if ($umkm->gambar) {
            Storage::delete('public/images/' . $umkm->gambar);
        }

        if ($umkm->delete()) {
            return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus.');
        } else {
            return redirect()->route('umkm.index')->with('error', 'Gagal menghapus UMKM.');
        }
    }
}
