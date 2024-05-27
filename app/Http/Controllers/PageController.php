<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\KegiatanModel;
use App\Models\LaporanMasalahModel;
use App\Models\PengumumanModel;
use App\Models\RTModel;
use App\Models\RwModel;
use App\Models\UMKMModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function showPengurusRW()
    {
        // Retrieve RW data
        $rw = RwModel::first();

        // Retrieve RT data associated with the RW
        $rts = RTModel::where('id_rw', $rw->id_rw)->get();

        // Pass the data to the view
        return view('page.struktur-rw.index', compact('rw', 'rts'));
    }

    public function showSuratForm()
    {
        // $jenis_surat_pengantar = JenisSuratPengantar::all();
        return view('surat_pengantar.create', compact('jenis_surat_pengantar'));
    }
    public function createSurat(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'id_jenis_surat' => 'required|exists:jenis_surat_pengantar,id_jenis_surat',
        ]);
        // SuratPengantar::create([ // Model Belum dibuat
        //     'tanggal' => $request->tanggal,
        //     'keterangan' => $request->keterangan,
        //     'id_warga' => Auth::user()->id_warga,
        //     'id_jenis_surat' => $request->id_jenis_surat,
        // ]);

        return redirect()->route('surat_pengantar.create')->with('success', 'Surat Pengantar created successfully.');
    }


    public function showPengumuman(Request $request)
{
    $perPage = 6; // Jumlah pengumuman per halaman
    $page = $request->input('page', 1); // Halaman saat ini, default adalah 1
    $skip = ($page - 1) * $perPage;

    $totalPengumuman = PengumumanModel::count(); // Total pengumuman
    // Pengumuman untuk halaman saat ini, sorted by date descending
    $pengumumans = PengumumanModel::orderBy('tanggal', 'desc')->skip($skip)->take($perPage)->get();

    $totalPages = ceil($totalPengumuman / $perPage); // Total halaman

    return view('page.pengumuman.index', compact('pengumumans', 'totalPengumuman', 'totalPages', 'page'));
}


    public function showDetailPengumuman($id_pengumuman)
    {

        $pengumuman = PengumumanModel::with('rt')->findOrFail($id_pengumuman);
        return view('page.pengumuman.detailPengumuman', compact('pengumuman'));
    }


    public function showKegiatan(Request $request)
{
    $currentDateTime = Carbon::now();
    $perPage = 2; // Jumlah kegiatan per halaman

    // Get current page or default to 1
    $pageUpcoming = $request->input('page_upcoming', 1);
    $pagePast = $request->input('page_past', 1);

    // Calculate skip
    $skipUpcoming = ($pageUpcoming - 1) * $perPage;
    $skipPast = ($pagePast - 1) * $perPage;

    // Get upcoming activities
    $totalUpcomingActivities = KegiatanModel::where('tanggal', '>', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '>=', $currentDateTime->toTimeString());
        })
        ->count();

    $upcomingActivities = KegiatanModel::where('tanggal', '>', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '>=', $currentDateTime->toTimeString());
        })
        ->orderBy('tanggal', 'asc')
        ->orderBy('waktu', 'asc')
        ->skip($skipUpcoming)
        ->take($perPage)
        ->get();

    // Get past activities
    $totalPastActivities = KegiatanModel::where('tanggal', '<', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '<', $currentDateTime->toTimeString());
        })
        ->count();

    $pastActivities = KegiatanModel::where('tanggal', '<', $currentDateTime->toDateString())
        ->orWhere(function ($query) use ($currentDateTime) {
            $query->where('tanggal', '=', $currentDateTime->toDateString())
                ->where('waktu', '<', $currentDateTime->toTimeString());
        })
        ->orderBy('tanggal', 'desc')
        ->orderBy('waktu', 'desc')
        ->skip($skipPast)
        ->take($perPage)
        ->get();

    $totalPagesUpcoming = ceil($totalUpcomingActivities / $perPage);
    $totalPagesPast = ceil($totalPastActivities / $perPage);

    return view('page.kegiatan.index', compact('upcomingActivities', 'pastActivities', 'pageUpcoming', 'pagePast', 'totalPagesUpcoming', 'totalPagesPast'));
}


    public function showDetailKegiatan($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
    return view('page.kegiatan.detailKegiatan', compact('kegiatan'));
    }
    public function showLaporan(Request $request)
    {
        $perPage = 6; // Number of reports per page
        $page = $request->input('page', 1); // Current page, default is 1
        $skip = ($page - 1) * $perPage;

        $totalLaporan = LaporanMasalahModel::count(); // Total reports
        // Reports for the current page, sorted by date descending
        $laporans = LaporanMasalahModel::with('warga')->orderBy('tanggal_laporan', 'desc')->skip($skip)->take($perPage)->get();

        $totalPages = ceil($totalLaporan / $perPage); // Total pages

        return view('page.laporan.index', compact('laporans', 'totalLaporan', 'totalPages', 'page'));
    }


    public function showDetailLaporan($id)
{
    $laporan = LaporanMasalahModel::with('warga')
        ->where('id_laporan_masalah', $id)
        ->first();

    if (!$laporan) {
        abort(404);
    }

    return view('page.laporan.detail', compact('laporan'));
}

public function showUMKM(Request $request)
    {
        $perPage = 6; // Number of UMKM per page
        $page = $request->input('page', 1); // Current page, default is 1
        $skip = ($page - 1) * $perPage;

        $totalUmkm = UMKMModel::count(); // Total UMKM
        $umkms = UMKMModel::orderBy('nama_umkm')->skip($skip)->take($perPage)->get(); // UMKM for current page

        $totalPages = ceil($totalUmkm / $perPage); // Total pages

        return view('page.umkm.index', compact('umkms', 'totalUmkm', 'totalPages', 'page'));
    }

    /**
     * Display the specified UMKM.
     */
    public function showDetailUmkm($id)
    {
        $umkm = UMKMModel::findOrFail($id);
        return view('page.umkm.detail', compact('umkm'));
    }


    public function showBansos(){
        $bansosList = Bansos::all();
        return view('page.bansos.index', compact('bansosList'));
    }

    }


