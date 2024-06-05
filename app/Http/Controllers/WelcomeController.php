<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\WargaModel;
use App\Models\Bansos;
use App\Models\PenerimaBansosModel;
use App\Models\WargaSementaraModel;
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
        $jumlah_sementara = WargaSementaraModel::count();
        $jumlah_laki = WargaModel::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_perempuan = WargaModel::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_laki_sementara = WargaSementaraModel::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_perempuan_sementara = WargaSementaraModel::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_sementara_laki = WargaSementaraModel::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlah_sementara_perempuan = WargaSementaraModel::where('jenis_kelamin', 'Perempuan')->count();
        $jumlah_bansos = Bansos::count();
        $jumlah_penerima_bansos = PenerimaBansosModel::count();

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'jumlah_warga' => $jumlah_warga,
            'jumlah_rt' => $jumlah_rt,
            'jumlah_rw' => $jumlah_rw,
            'jumlah_sementara' => $jumlah_sementara,
            'jumlah_laki' => $jumlah_laki,
            'jumlah_perempuan' => $jumlah_perempuan,
            'jumlah_laki_sementara' => $jumlah_laki_sementara,
            'jumlah_perempuan_sementara' => $jumlah_perempuan_sementara,
            'jumlah_sementara_laki' => $jumlah_sementara_laki,
            'jumlah_sementara_perempuan' => $jumlah_sementara_perempuan,
            'jumlah_bansos' => $jumlah_bansos,
            'jumlah_penerima_bansos' => $jumlah_penerima_bansos,
        ]);
    }
}
