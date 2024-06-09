<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use App\Models\RtModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeluargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Keluarga',
            'list' => ['Home', 'keluarga']
        ];
        $page = (object) [
            'title' => 'Keluarga yang terdaftar pada sistem',
        ];
        $activeMenu = 'keluarga';

        $rt = RtModel::all();

        return view('Keluarga.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function show($id){
        // Mengambil data warga berdasarkan ID
        $keluarga = KeluargaModel::with('rt')->findOrFail($id);

        // Membuat objek breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail Ketua Keluarga',
            'list' => ['Home', 'Keluarga', 'Detail']
        ];

        // Membuat objek page
        $page = (object) [
            'title' => 'Detail Keluarga'
        ];

        // Menentukan active menu
        $activeMenu = 'keluarga';

        // Mengirim data ke view
        return view('Keluarga.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'keluarga' => $keluarga,
            'activeMenu' => $activeMenu,
        ]);
    }


    public function list(Request $request)
    {
        $columns = [
            0 => 'id_keluarga',
            1 => 'nomor_kk',
            2 => 'alamat',
            3 => 'rt.no_rt',
        ];
    
        $totalData = KeluargaModel::count();
        $totalFiltered = $totalData;
    
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
    
        if (empty($request->input('search.value'))) {
            $keluargas = KeluargaModel::with(['rt', 'warga'])->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');
    
            $keluargas = KeluargaModel::with(['rt', 'warga'])
                ->where('nomor_kk', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->orWhereHas('rt', function($query) use ($search) {
                    $query->where('no_rt', 'LIKE', "%{$search}%");
                })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
    
            $totalFiltered = KeluargaModel::with(['rt', 'warga'])
                ->where('nomor_kk', 'LIKE', "%{$search}%")
                ->orWhere('alamat', 'LIKE', "%{$search}%")
                ->orWhereHas('rt', function($query) use ($search) {
                    $query->where('no_rt', 'LIKE', "%{$search}%");
                })
                ->count();
        }
    
        $data = [];
        if (!empty($keluargas)) {
            foreach ($keluargas as $keluarga) {
                $nestedData['id_keluarga'] = $keluarga->id_keluarga;
                $nestedData['nomor_kk'] = $keluarga->nomor_kk;
                $nestedData['alamat'] = $keluarga->alamat;
                $nestedData['rt'] = $keluarga->rt ? $keluarga->rt->no_rt : 'Tidak ada data RT';
                $nestedData['aksi'] = '<a href="'.url('keluarga/'.$keluarga->id_keluarga.'/edit').'" class="btn btn-sm btn-warning">Edit</a>';
                $nestedData['warga'] = $keluarga->warga;
        
                $data[] = $nestedData;
            }
        }
    
        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];
    
        return response()->json($json_data);
    }
    
    
    

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Keluarga',
            'list' => ['Home', 'Keluarga', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Keluarga Baru',
        ];

        $rt = RtModel::all();
        $activeMenu = 'keluarga';

        return view('Keluarga.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kk' => 'required',
            'alamat' => 'required|string|max:255',
            'id_rt' => 'required',
        ]);

        KeluargaModel::create([
            'nomor_kk' => $request->nomor_kk,
            'alamat' => $request->alamat,
            'id_rt' => $request->id_rt,
        ]);

        return redirect('/keluarga')->with('success', 'Data Keluarga baru telah ditambahkan');
    }

    public function edit(string $id){
        $keluarga = KeluargaModel::find($id);
        $rt = RtModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Keluarga',
            'list' => ['Home', 'Keluarga', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Keluarga'
        ];

        $activeMenu = 'keluarga';

        return view('Keluarga.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'keluarga' => $keluarga,
            'activeMenu' => $activeMenu,
            'rt' => $rt
        ]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'nomor_kk' => 'required',
            'alamat' => 'required|string|max:255',
            'id_rt' => 'required',
        ]);

        KeluargaModel::find($id)->update([
            'nomor_kk' => $request->nomor_kk,
            'alamat' => $request->alamat,
            'id_rt' => $request->id_rt,
        ]);

        return redirect('/keluarga')->with('success', 'Data keluarga berhasil diubah');
    }

    public function destroy(string $id){
        $check = KeluargaModel::find($id);
        if (!$check){
            return redirect('/keluarga')->with('error', 'Data keluarga tidak ditemukan');
        }

        try{
            KeluargaModel::destroy($id);

            return redirect('/keluarga')->with('success', 'Data Keluarga berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/keluarga')->with('error', 'Data Keluarga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
