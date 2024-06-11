<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\KasModel;
use App\Models\KegiatanModel;
use App\Models\PenerimaBansosModel;
use App\Models\PengumumanModel;
use App\Models\RtModel;
use App\Models\UMKMModel;
use App\Models\WargaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index($role)
{
    $breadcrumb = (object)[
        'title' => 'Selamat Datang',
        'list' => ['Home','Welcome'],
    ];

    $activeMenu='dashboard';

    $jumlah_warga = WargaModel::where('roles', 'warga')->count();
    $jumlah_rt = RtModel::count();
    $jumlah_sementara = WargaModel::where('roles', 'warga sementara')->count();
    $jumlah_laki = WargaModel::where('jenis_kelamin', 'Laki-laki')->where('roles', 'warga')->count();
    $jumlah_perempuan = WargaModel::where('jenis_kelamin', 'Perempuan')->where('roles', 'warga')->count();
    $jumlah_sementara_laki = WargaModel::where('jenis_kelamin', 'Laki-laki')->where('roles', 'warga sementara')->count();
    $jumlah_sementara_perempuan = WargaModel::where('jenis_kelamin', 'Perempuan')->where('roles', 'warga sementara')->count();
    $jumlah_bansos = Bansos::count();
    $jumlah_pending_bansos = PenerimaBansosModel::where('status', 'pending')->count();
    $jumlah_penerima_bansos = PenerimaBansosModel::where('status', 'diterima')->count();
    $kas_data = KasModel::selectRaw('DATE(tanggal) as tanggal, SUM(jumlah_masuk) as jumlah_masuk, SUM(jumlah_keluar) as jumlah_keluar')
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->get();
    $kas_date = $kas_data->pluck('tanggal');
    $jumlah_kas_masuk = $kas_data->pluck('jumlah_masuk')->map(function ($item) {
        return (int)$item;
    })->toArray();
    $jumlah_kas_keluar = $kas_data->pluck('jumlah_keluar')->map(function ($item) {
        return (int)$item;
    })->toArray();
    
    return view('welcome', [
        'breadcrumb' => $breadcrumb,
        'activeMenu' => $activeMenu,
        'jumlah_warga' => $jumlah_warga,
        'jumlah_rt' => $jumlah_rt,
        'jumlah_sementara' => $jumlah_sementara,
        'jumlah_laki' => $jumlah_laki,
        'jumlah_perempuan' => $jumlah_perempuan,
        'jumlah_sementara_laki' => $jumlah_sementara_laki,
        'jumlah_sementara_perempuan' => $jumlah_sementara_perempuan,
        'jumlah_bansos' => $jumlah_bansos,
        'jumlah_pending_bansos' => $jumlah_pending_bansos,
        'jumlah_penerima_bansos' => $jumlah_penerima_bansos,
        'kas_date' => $kas_date,
        'jumlah_kas_masuk' => $jumlah_kas_masuk,
        'jumlah_kas_keluar' => $jumlah_kas_keluar,
    ]);
}

public function DashboardRW(){
    return $this->index('rw');
}

public function DashboardRT(){
    return $this->index('rt');
}

    public function DashboardWarga(){
        $currentDateTime = Carbon::now();

        $pengumumans = PengumumanModel::orderBy('tanggal', 'desc')->take(1)->get();
        $umkms = UMKMModel::with('warga')->where('status_pengajuan','=','approved')->inRandomOrder()->take(4)->get();
        $kegiatans = KegiatanModel::where('tanggal', '>', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '>=', $currentDateTime->toTimeString());
        })
        ->orderBy('tanggal', 'asc')
        ->orderBy('waktu', 'asc')
        ->take(3)
        ->get();
        return view('user-login.main',compact('pengumumans','umkms','kegiatans'));
    }

    public function DashboardGuest(){
        return view('Guest.main');
    }
}
