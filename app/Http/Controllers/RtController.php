<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use App\Models\KetuaRtModel;
use Illuminate\Http\Request;
use App\Models\RtModel;
use App\Models\WargaModel;
use Carbon\Carbon;
use Database\Seeders\RTSeeder;
use Yajra\DataTables\Facades\DataTables;

class RtController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Ketua RT',
            'list' => ['Home', 'RT']
        ];
        $page = (object) [
            'title' => 'Ketua RT yang terdaftar pada sistem',
        ];
        $activeMenu = 'rt';

        $rts = RtModel::with('ketuaRt.warga')->get();

        return view('RT.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rts' => $rts
        ]);
    }

    public function show($id){
        $breadcrumb = (object) [
            'title' => 'Detail Ketua RT',
            'list' => ['Home', 'RT', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Ketua RT'
        ];

        $activeMenu = 'rw';

        $rt = RtModel::with(['ketuaRt.warga'])->findOrFail($id);

        return view('RT.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rt' => $rt,
            'activeMenu' => $activeMenu
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Ketua RT',
            'list' => ['Home', 'RT', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Ketua RT Baru',
        ];

        $activeMenu = 'rw';

        return view('RT.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $rt = RtModel::create([
            'no_rt' => (RtModel::max('id_rt') + 1),
            'id_rw' => 1,
        ]);
    
        return redirect('/rw')->with('success', 'RT baru berhasil ditambahkan');
    }

    public function edit($id){
        $breadcrumb = (object) [
            'title' => 'Edit Ketua RT',
            'list' => ['Home', 'RT', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Ketua RT'
        ];

        $rt = RtModel::find($id);
        $activeMenu = 'rw';
        $wargas = WargaModel::whereNotIn('roles', ['rt','rw', 'warga sementara'])
            ->with('keluarga.rt')
            ->get();

        return view('RT.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rt' => $rt,
            'activeMenu' => $activeMenu,
            'wargas' => $wargas
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'no_rt' => 'required',
            'id_warga' => 'required|exists:warga,id_warga',
        ]);

        $now = Carbon::now();

        $currentKetua = KetuaRtModel::where('id_rt', $id)->where('status', 'Aktif')->first();
        if ($currentKetua){
            $currentKetua->update([
                'status' => 'Pensiun',
                'akhir_jabatan' => $now
            ]);

            $oldKetua = WargaModel::find($currentKetua->id_warga);
            if ($oldKetua){
                $oldKetua->roles = 'warga';
                $oldKetua->save();
            }
        }

        KetuaRtModel::create([
            'id_rt' => $id,
            'id_warga' => $request->id_warga,
            'status' => 'Aktif',
            'mulai_jabatan' => $now
        ]);
        RtModel::find($id)->update([
            'no_rt' => $request->no_rt,
        ]);
        $warga = WargaModel::find($request->id_warga);
        $warga->roles = 'rt';
        $warga->save();

        $keluarga = KeluargaModel::find($warga->id_keluarga);
        if ($keluarga && $keluarga->id_rt != $id){
            $keluarga->update([
                'id_rt' => $id
            ]);
        }

        return redirect('/rw')->with('success', 'Data RT berhasil diubah');
    }

    public function destroy(string $id){
        $check = RtModel::find($id);
        if (!$check){
            return redirect('/rw')->with('error', 'Data rt tidak ditemukan');
        }

        try{
            RtModel::destroy($id);

            return redirect('/rw')->with('success', 'Data RT berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/rw')->with('error', 'Data RT gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
