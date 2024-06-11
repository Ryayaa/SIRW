<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\PengumumanModel;
use App\Models\UMKMModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function DashboardRW(){
        return view('rw-login.index', ['activeMenu' => 'dashboard']);
    }
    public function DashboardRT(){
        return view('rt-login.index', ['activeMenu' => 'dashboard']);
    }
    public function DashboardWarga(){
        $currentDateTime = Carbon::now();

        $pengumumans = PengumumanModel::orderBy('tanggal', 'desc')->take(1)->get();
        $umkms = UMKMModel::with('warga')->where('status_pengajuan','approved')->inRandomOrder()->take(3)->get();
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
        $currentDateTime = Carbon::now();

        $pengumumans = PengumumanModel::orderBy('tanggal', 'desc')->take(1)->get();
        $umkms = UMKMModel::with('warga')->where('status_pengajuan','=','approved')->inRandomOrder()->take(3)->get();
        $kegiatans = KegiatanModel::where('tanggal', '>', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '>=', $currentDateTime->toTimeString());
        })
        ->orderBy('tanggal', 'asc')
        ->orderBy('waktu', 'asc')
        ->take(3)
        ->get();
        return view('Guest.main',compact('pengumumans','umkms','kegiatans'));
    }
}


