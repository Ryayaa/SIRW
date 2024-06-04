<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\KegiatanModel;
use App\Models\KriteriaBansosModel;
use App\Models\LaporanMasalahModel;
use App\Models\NilaiAlternatifModel;
use App\Models\PenerimaBansosModel;
use App\Models\PengumumanModel;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\Tamu;
use App\Models\UMKMModel;
use App\Models\WargaSementaraModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function showPengurusRW()
    {
        // Retrieve RW data
        $rw = RwModel::first();

        // Retrieve RT data associated with the RW
        $rts = RtModel::where('id_rw', $rw->id_rw)->get();

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

    public function detailBansos($id){
        $bansos = Bansos::with('kriteria')->findOrFail($id);
        return view('page.bansos.detail', compact('bansos'));
    }
    public function showPengajuan(){
        $bansosList = Bansos::all();
        return view('page.pengajuan.index', compact('bansosList'));
    }

    public function checkPengajuan($idBansos)
    {
        $user = Auth::user();
        $idWarga = $user->id_warga;
        $idKeluarga = $user->id_keluarga;

        // Cek apakah user atau anggota keluarga sudah mengajukan atau diterima
        $existingPengajuan = PenerimaBansosModel::where('id_bansos', $idBansos)
            ->where(function ($query) use ($idWarga, $idKeluarga) {
                $query->where('id_warga', $idWarga)
                      ->orWhereHas('warga', function ($query) use ($idKeluarga) {
                          $query->where('id_keluarga', $idKeluarga);
                      });
            })
            ->first();

        if ($existingPengajuan) {
            return redirect()->route('pengajuan.detail', ['idBansos' => $idBansos, 'idPengajuan' => $existingPengajuan->id_penerima]);
        } else {
            return redirect()->route('pengajuan.form', ['idBansos' => $idBansos]);
        }
    }

    public function detailPengajuan($idBansos, $idPengajuan)
    {
        $pengajuan = PenerimaBansosModel::with('nilaiA.kriteria.subkriteria')->findOrFail($idPengajuan);
        return view('page.pengajuan.detail', compact('pengajuan'));
    }

    public function formPengajuan($idBansos){     
        $kriteria = KriteriaBansosModel::where('id_bansos', $idBansos)->with(['subkriteria'])->get();

        return view('page.pengajuan.form', compact('kriteria', 'idBansos'));
    }

    public function storePengajuan(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_bansos' => 'required|exists:bansos,id_bansos',
            'id_kriteria' => 'required|array',
            'id_kriteria.*' => 'required|exists:nilai_kriteria,id_nilai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id_warga = Auth::user()->id_warga;

        // Cek apakah warga sudah mengajukan sebelumnya
        $existingPenerima = PenerimaBansosModel::where('id_warga', $request->id_warga)
                                                ->where('id_bansos', $request->id_bansos)
                                                ->exists();

        if ($existingPenerima) {
            return redirect()->back()->with('error', 'Warga ini sudah mengajukan atau telah menerima bantuan sosial.');
        }

        // Simpan data penerima dan nilai kriteria
        try {
            // Simpan data penerima
            $penerima = PenerimaBansosModel::create([
                'id_bansos' => $request->id_bansos,
                'id_warga' => $id_warga,
                'status' => 'pending',
            ]);

            // Simpan nilai kriteria ke dalam tabel nilai_alternatif
            foreach ($request->id_kriteria as $id_kriteria => $id_nilai) {
                NilaiAlternatifModel::create([
                    'id_penerima' => $penerima->id_penerima,
                    'id_kriteria' => $id_kriteria,
                    'id_nilai' => $id_nilai,
                ]);
            }

            return redirect('/pengajuan-list')->with('success', 'Data penerima bantuan sosial berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }


    public function showLaporanForm(){
        return view('page.laporan.form');
    }

    public function createLaporanForm(Request $request){
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image',
            'status_hide' => 'required|in:y,t',
        ]);

        $laporan = new LaporanMasalahModel();
        $laporan->judul_laporan = $request->judul_laporan;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->tanggal_laporan = Carbon::today()->toDateString();

        if ($request->hasFile('gambar')) {
            $laporan->gambar = $request->file('gambar')->store('gambar');
        }

        $laporan->id_warga = Auth::user()->id_warga;
        $laporan->status_hide = $request->status_hide == 't' ? 't' : 'y';
        $laporan->save();

        return redirect()->route('laporanMasalah')->with('success', 'Laporan berhasil dibuat.');
    }

    public function showPengajuanUMKMForm(){
        return view('page.umkm.form');
    }
    public function createPengajuanUMKMForm(Request $request){
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|min:10|max:13',
            'gambar' => 'nullable|image',
        ]);

        $umkm = new UMKMModel();
        $umkm->nama_umkm = $request->nama_umkm;
        $umkm->alamat = $request->alamat;
        $umkm->no_telepon = $request->no_telepon;

        if ($request->hasFile('gambar')) {
            $umkm->gambar = $request->file('gambar')->store('gambar_umkm');
        }

        $umkm->id_warga = Auth::user()->id_warga;
        $umkm->save();

        return redirect()->route('umkm.user-login')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function showTamuForm(){
        return view('page.tamu.form');
    }

    public function createTamuForm(Request $request){
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_ktp' => 'required|string',
            'alamat_menetap' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'bukti_ktp' => 'required|image',
        ]);

        $tamu = new Tamu();
        $tamu->nama_lengkap = $request->nama_lengkap;
        $tamu->tanggal_lahir = $request->tanggal_lahir;
        $tamu->tempat_lahir = $request->tempat_lahir;
        $tamu->jenis_kelamin = $request->jenis_kelamin;
        $tamu->alamat_ktp = $request->alamat_ktp;
        $tamu->alamat_menetap = $request->alamat_menetap;
        $tamu->no_telepon = $request->no_telepon;
        $tamu->tanggal_masuk = $request->tanggal_masuk;
        $tamu->tanggal_keluar = $request->tanggal_keluar;

        if ($request->hasFile('bukti_ktp')) {
            $tamu->bukti_ktp = $request->file('bukti_ktp')->store('bukti_ktp');
        }

        $tamu->save();

        return redirect()->route('tamu_form.show')->with('success', 'Tamu berhasil ditambahkan.');
    }

    public function showWargaSementaraForm(){
        return view('page.WargaSementara.form');
    }

    public function createWargaSementaraForm(Request $request){
        $request->validate([
            'bukti_ktp' => 'required|image',
            'nik' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_asal' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Mati,Cerai Hidup',
            'tanggal_masuk' => 'required|date',
            'password' => 'required|string',
        ]);

        $warga_sementara = new WargaSementaraModel();
        $warga_sementara->nik = $request->nik;
        $warga_sementara->tanggal_lahir = $request->tanggal_lahir;
        $warga_sementara->nama_lengkap = $request->nama_lengkap;
        $warga_sementara->jenis_kelamin = $request->jenis_kelamin;
        $warga_sementara->alamat_asal = $request->alamat_asal;
        $warga_sementara->alamat_domisili = $request->alamat_domisili;
        $warga_sementara->pekerjaan = $request->pekerjaan;
        $warga_sementara->status_perkawinan = $request->status_perkawinan;
        $warga_sementara->tanggal_masuk = $request->tanggal_masuk;
        $warga_sementara->password = $request->password;
        $warga_sementara->username = $request->nik;
        $warga_sementara->id_warga = Auth::user()->id_warga;;

        if ($request->hasFile('bukti_ktp')) {
            $warga_sementara->bukti_ktp = $request->file('bukti_ktp')->store('bukti_ktp');
        }
        $warga_sementara->save();

        return redirect()->route('warga-sementara_form.show')->with('success', 'Warga Sementara berhasil ditambahkan.');
    }

}
