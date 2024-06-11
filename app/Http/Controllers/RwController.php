<?php

namespace App\Http\Controllers;

use App\Models\RwModel;
use App\Models\WargaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RwController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Ketua RW',
            'list' => ['Home', 'RW']
        ];
        $page = (object) [
            'title' => 'Ketua RW yang terdaftar pada sistem',
        ];
        $activeMenu = 'rw';

        $rw = RwModel::with('warga')->where('status', 'Aktif')->first();

        return view('RW.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rw' => $rw
        ]);
    }

    public function show($id){
        $breadcrumb = (object) [
            'title' => 'Detail Ketua RW',
            'list' => ['Home', 'RW', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Ketua RW'
        ];

        $activeMenu = 'rw';

        $rw = RwModel::with('warga')->findOrFail($id);

        return view('RW.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'rw' => $rw,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id){
        $breadcrumb = (object) [
            'title' => 'Rubah Ketua RW',
            'list' => ['Home', 'RW', 'Edit']
        ];

        $page = (object) [
            'title' => 'Rubah Ketua RW'
        ];

        $activeMenu = 'rw';
        $rw = RwModel::with('warga')->findOrFail($id);
        $wargas = WargaModel::whereNotIn('roles', ['rw'])->get();
    
        return view('RW.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rw' => $rw,
            'wargas' => $wargas
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_warga' => 'required|exists:warga,id_warga'
        ]);
    
        $now = Carbon::now();
    
        $currentRw = RwModel::findOrFail($id);
        if ($currentRw) {
            $currentRw->update([
                'status' => 'Pensiun',
                'akhir_jabatan' => $now
            ]);
    
            $oldRw = WargaModel::find($currentRw->id_warga);
            if ($oldRw) {
                $oldRw->roles = 'warga';
                $oldRw->save();
            }
        }
    
        RwModel::create([
            'id_warga' => $request->id_warga,
            'status' => 'Aktif',
            'mulai_jabatan' => $now
        ]);
    
        $newRw = WargaModel::find($request->id_warga);
        $newRw->roles = 'rw';
        $newRw->save();
    
        return redirect('/rw')->with('success', 'Ketua RW berhasil diubah');
    }

    public function destroy(string $id){
        $check = RwModel::find($id);
        if (!$check){
            return redirect('/rw')->with('error', 'Data rw tidak ditemukan');
        }

        try{
            RwModel::destroy($id);

            return redirect('/rw')->with('success', 'Data RW berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/rw')->with('error', 'Data RW gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }

    }
}
