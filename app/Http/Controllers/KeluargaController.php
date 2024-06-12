<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use App\Models\RtModel;
use App\Models\WargaModel;
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

        $activeMenu = 'keluarga';
        $rt = RtModel::all();

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
            'bukti_kk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti_kk')) {
            $extension = $request->bukti_kk->extension();
            $imageName = $request->nomor_kk.'.'.$extension;
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/warga/kk'))) {
                mkdir(public_path('images/warga/kk'), 0777, true);
            }
            $request->bukti_kk->move(public_path('images/warga/kk'), $imageName);
            $data['bukti_kk'] = $imageName;
        }
        KeluargaModel::create($data);

        return redirect('/Keluarga')->with('success', 'Data Keluarga baru telah ditambahkan');
    }

    public function edit($id){
        $keluarga = KeluargaModel::findOrFail($id);

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
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nomor_kk' => 'required|string|max:255',
            'alamat' => 'required|string',
            'id_rt' => 'required|exists:rt,id_rt',
            'bukti_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $keluarga = KeluargaModel::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('bukti_kk')) {
            $imageName = $data['nomor_kk'] . '.' . $request->bukti_kk->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/warga/kk'))) {
                mkdir(public_path('images/warga/kk'), 0777, true);
            }
            $request->bukti_kk->move(public_path('images/warga/kk'), $imageName);
            $data['bukti_kk'] = $imageName;
        }

        $keluarga->update($data);

            return redirect('/Keluarga')->with('success', 'Data keluarga berhasil diubah');
        }

    public function destroy(string $id){
        $check = KeluargaModel::find($id);
        if (!$check){
            return redirect('/Keluarga')->with('error', 'Data keluarga tidak ditemukan');
        }

        try{
            KeluargaModel::destroy($id);

            return redirect('/Keluarga')->with('success', 'Data Keluarga berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/Keluarga')->with('error', 'Data Keluarga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }

    public function createWarga(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga Baru',
            'list' => ['Home', 'Warga', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Keluarga Baru',
        ];

        $activeMenu = 'keluarga';

        $keluargaId = $request->query('keluarga_id');
        $keluarga = KeluargaModel::find($keluargaId);
        return view('Keluarga.createWarga', compact('keluargaId', 'keluarga', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function storeWarga(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
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

        WargaModel::create($data);

        return redirect('/Keluarga')->with('success', 'Warga berhasil ditambahkan');
    }

    public function showWarga($id)
    {
        $warga = WargaModel::with('keluarga')->findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => ['Home', 'Warga', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Warga',
        ];

        $activeMenu = 'keluarga';

        return view('Keluarga.showWarga', compact('warga', 'breadcrumb', 'page', 'activeMenu'));
    }


    public function editWarga($id)
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

        $activeMenu = 'keluarga';

        return view('Keluarga.editWarga', compact('warga', 'breadcrumb', 'page','activeMenu', 'keluarga'));
    }

    public function updateWarga(Request $request, $id)
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

        return redirect()->route('Keluarga.showWarga', $id)->with('success', 'Data Warga telah diperbarui');
    }
}
