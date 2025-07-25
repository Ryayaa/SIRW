<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\JenisSuratModel;
use App\Models\KegiatanModel;
use App\Models\KetuaRtModel;
use App\Models\KriteriaBansosModel;
use App\Models\LaporanMasalahModel;
use App\Models\NilaiAlternatifModel;
use App\Models\PenerimaBansosModel;
use App\Models\PengumumanModel;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\SuratModel;
use App\Models\Tamu;
use App\Models\UMKMModel;
use App\Models\WargaSementaraModel;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function showPengurusRW()
    {
        // Retrieve RW data
        $rw = RwModel::with('warga')->where('status', 'Aktif')->first();

        // Retrieve RT data associated with the RW
        $rts = KetuaRtModel::with('warga')->where('status', 'aktif')->get();

        // Pass the data to the view
        return view('page.struktur-rw.index', compact('rw', 'rts'));
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
        $perPage = 6; // Jumlah kegiatan per halaman

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

        $totalLaporan = LaporanMasalahModel::whereIn('status_pengajuan', ['approved', 'wait'])->count();
// Total reports
        // Reports for the current page, sorted by date descending
        $laporans = LaporanMasalahModel::with('warga')->whereIn('status_pengajuan',[ 'approved','wait'])->orderBy('tanggal_laporan', 'desc')->skip($skip)->take($perPage)->get();

        $totalPages = ceil($totalLaporan / $perPage); // Total pages

        return view('page.laporan.index', compact('laporans', 'totalLaporan', 'totalPages', 'page'));
    }


    public function showDetailLaporan($id)
    {
        $laporan = LaporanMasalahModel::with(['warga', 'feedback'])
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
        $search = $request->input('search', ''); // Search query

        $query = UMKMModel::where('status_pengajuan', 1);

        if ($search) {
            $query->where('nama_umkm', 'like', '%' . $search . '%');
        }

        $totalUmkm = $query->count(); // Total UMKM
        $umkms = $query->orderBy('nama_umkm')->skip($skip)->take($perPage)->get(); // UMKM for current page

        $totalPages = ceil($totalUmkm / $perPage); // Total pages

        return view('page.umkm.index', compact('umkms', 'totalUmkm', 'totalPages', 'page', 'search'));
    }


    /**
     * Display the specified UMKM.
     */
    public function showDetailUmkm($id)
    {
        $umkm = UMKMModel::findOrFail($id);
        return view('page.umkm.detail', compact('umkm'));
    }


    public function showBansos()
    {
        $bansosList = Bansos::all();
        return view('page.bansos.index', compact('bansosList'));
    }

    public function detailBansos($id)
    {
        $bansos = Bansos::with('kriteria')->findOrFail($id);
        return view('page.bansos.detail', compact('bansos'));
    }
    public function showPengajuan()
    {
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

    public function formPengajuan($idBansos)
    {
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


    public function showLaporanForm()
    {
        return view('page.laporan.form');
    }

    public function createLaporanForm(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_hide' => 'in:y,t',
        ]);

        $laporan = new LaporanMasalahModel();
        $laporan->judul_laporan = $request->judul_laporan;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->tanggal_laporan = Carbon::today()->toDateString();

        if ($request->hasFile('gambar')) {
            $imageName = 'laporan_masalah_' . time() . '.' . $request->gambar->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/laporan_masalah'))) {
                mkdir(public_path('images/laporan_masalah'), 0777, true);
            }
            $request->gambar->move(public_path('images/laporan_masalah'), $imageName);
            $laporan['gambar'] = 'laporan_masalah/' . $imageName;
        }

        $laporan->id_warga = Auth::user()->id_warga;
        $laporan->status_hide = $request->status_hide == 't' ? 't' : 'y';
        $laporan->save();

        return redirect()->route('laporanMasalah')->with('success', 'Laporan berhasil dibuat.');
    }

    public function showPengajuanUMKMForm()
    {
        return view('page.umkm.form');
    }
    public function createPengajuanUMKMForm(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'no_telepon' => 'required|string|min:10|max:13',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $umkm = new UMKMModel();
        $umkm->nama_umkm = $request->nama_umkm;
        $umkm->alamat = $request->alamat;
        $umkm->no_telepon = $request->no_telepon;
        $umkm->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {

            $imageName = 'umkm_'.time() . '.' . $request->gambar->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/umkm'))) {
                mkdir(public_path('images/umkm'), 0777, true);
            }
            $request->gambar->move(public_path('images/umkm'), $imageName);
            $umkm['gambar'] = 'umkm/' . $imageName;
        }



        $umkm->id_warga = Auth::user()->id_warga;
        $umkm->save();

        return redirect()->route('umkm.user-login')->with('success', 'UMKM berhasil diajukan.');
    }

    public function showTamuForm()
    {
        return view('page.tamu.form');
    }

    public function createTamuForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat_ktp' => 'required|string',
            'alamat_menetap' => 'required|string',
            'no_telepon' => 'required|string|max:13|min:10',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'bukti_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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

            $imageName = 'tamu_' . time() . '.' . $request->bukti_ktp->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/tamu'))) {
                mkdir(public_path('images/tamu'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/tamu'), $imageName);
            $tamu['bukti_ktp'] = 'tamu/' . $imageName;
        }

        $tamu->save();

        return redirect()->route('tamu_form.show')->with('success', 'Tamu berhasil diajukan.');
    }


    public function listWargaSementara(){
        $wargaSementaraList = WargaSementaraModel::where('pengaju', Auth::user()->nik)->get();
        return view('page.WargaSementara.index', compact('wargaSementaraList'));
    }

    public function detailWargaSementara($id)
    {
        $warga = WargaSementaraModel::findOrFail($id);
        return view('page.WargaSementara.detail', compact('warga'));
    }


    public function showWargaSementaraForm(){
        return view('page.WargaSementara.form');
    }

    public function createWargaSementaraForm(Request $request)
    {
        $request->validate([
            'bukti_ktp' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'nik' => 'required|string|max:16|unique:warga_sementara,nik',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:100',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:50',
            'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Mati,Cerai Hidup',
            'no_telepon' => 'required|string|max:15',
        ]);

        $validatedData = $request->all();
        if ($request->hasFile('bukti_ktp')) {
            $file = $request->file('bukti_ktp');
            $fileName = $request->nik . '.' . $file->getClientOriginalExtension();
            if (!file_exists(public_path('images/warga_sementara'))) {
                mkdir(public_path('images/warga_sementara'), 0777, true);
            }
            $request->bukti_ktp->move(public_path('images/warga_sementara'), $fileName);
            $validatedData['bukti_ktp'] = 'warga_sementara/'.$fileName;
        }
        $validatedData['pengaju'] = Auth::user()->nik;

        WargaSementaraModel::create($validatedData);

        return redirect()->route('warga-sementara_form.show')->with('success', 'Pengajuan data warga sementara berhasil disimpan.');
    }



    public function showSuratForm()
    {
        $jenis_surat_pengantar = JenisSuratModel::all();
        return view('page.surat.index', compact('jenis_surat_pengantar'));
    }
    public function createSurat(Request $request)
    {
        $request->validate([
            'id_jenis_surat' => 'required|integer',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $surat = SuratModel::create([
            'tanggal' => now(),
            'keterangan' => $request->id_jenis_surat == 6 ? $request->keterangan : '',
            'id_warga' => Auth::user()->id_warga,
            'id_jenis_surat' => $request->id_jenis_surat,
        ]);

        return redirect()->route('template-surat_pengantar.print', $surat->id_surat_pengantar)
            ->with('success', 'Surat pengantar berhasil dibuat.');
    }

    public function printSurat($id)
    {
        $surat_pengantar = SuratModel::with(['warga', 'jenisSurat'])->findOrFail($id);
        $pdf = Pdf::loadView('page.surat.templateSurat', compact('surat_pengantar'));

        return $pdf->stream('Surat_Pengantar.pdf');
    }
}
