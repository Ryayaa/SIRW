<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\WargaModel;
use App\Models\Bansos;
use App\Models\PenerimaBansosModel;
use App\Models\Tamu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // JS7 Praktikum 2 bagian 1
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Selamat Datang',
            'list' => ['Home','Welcome'],
        ];

        $activeMenu='dashboard';

        $jumlah_warga = WargaModel::count();
        $jumlah_rt = RtModel::count();
        $jumlah_rw = RwModel::count();
        $jumlah_tamu = Tamu::count();
        $jumlah_laki = WargaModel::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_perempuan = WargaModel::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_tamu_laki = Tamu::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_tamu_perempuan = Tamu::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_bansos = Bansos::count();
        $jumlah_penerima_bansos = PenerimaBansosModel::count();

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'jumlah_warga' => $jumlah_warga,
            'jumlah_rt' => $jumlah_rt,
            'jumlah_rw' => $jumlah_rw,
            'jumlah_tamu' => $jumlah_tamu,
            'jumlah_laki' => $jumlah_laki,
            'jumlah_perempuan' => $jumlah_perempuan,
            'jumlah_tamu_laki' => $jumlah_tamu_laki,
            'jumlah_tamu_perempuan' => $jumlah_tamu_perempuan,
            'jumlah_bansos' => $jumlah_bansos,
            'jumlah_penerima_bansos' => $jumlah_penerima_bansos,
        ]);
    }
}
