<?php

namespace App\Http\Controllers;

use App\Models\FeedbackLaporanModel;
use App\Models\LaporanMasalahModel;
use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use App\Models\RtModel;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Laporan Masalah',
            'list' => ['Home', 'Laporan']
        ];
        $page = (object) [
            'title' => 'Daftar Laporan yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'laporan';

        return view('laporan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }
    public function indexacc()
    {
        $breadcrumb = (object) [
            'title' => 'Laporan Masalah',
            'list' => ['Home', 'Laporan']
        ];
        $page = (object) [
            'title' => 'Daftar Laporan yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'laporan';

        return view('laporan.listacc', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }
    public function indexreject()
    {
        $breadcrumb = (object) [
            'title' => 'Laporan Masalah',
            'list' => ['Home', 'Laporan']
        ];
        $page = (object) [
            'title' => 'Daftar Laporan yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'laporan';

        return view('laporan.listreject', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }
    public function indexselesai()
    {
        $breadcrumb = (object) [
            'title' => 'Laporan Masalah',
            'list' => ['Home', 'Laporan']
        ];
        $page = (object) [
            'title' => 'Daftar Laporan yang Terdaftar pada Sistem',
        ];
        $activeMenu = 'laporan';

        return view('laporan.listselesai', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
        ]);
    }

    public function listacc(Request $request)
    {
        $laporan = LaporanMasalahModel::where('status_pengajuan','wait')->orderBy('tanggal_laporan')->with('warga')->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('nama_lengkap', function ($laporan) {
                return $laporan->warga->nama_lengkap;
            })

            ->addColumn('detail', function ($laporan) {
                $btn = '<a href="' . route('laporan-feedback.show', $laporan->id_laporan_masalah) . '" class="btn btn-info btn-sm">Detail</a> ';
                return $btn;
            })
            ->rawColumns(['detail'])
            ->make(true);
    }

    public function listreject(Request $request)
    {
        $laporan = LaporanMasalahModel::where('status_pengajuan','reject')->orderBy('tanggal_laporan')->with('warga')->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('nama_lengkap', function ($laporan) {
                return $laporan->warga->nama_lengkap;
            })
            ->addColumn('detail', function ($laporan) {
                $btn = '<a href="' . route('laporan.show', $laporan->id_laporan_masalah) . '" class="btn btn-info btn-sm">Detail</a> ';
                return $btn;
            })
            ->rawColumns(['detail',])
            ->make(true);
    }
    public function listselesai(Request $request)
    {
        $laporan = LaporanMasalahModel::where('status_pengajuan','approved')->orderBy('tanggal_laporan')->with('warga')->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('nama_lengkap', function ($laporan) {
                return $laporan->warga->nama_lengkap;
            })
            ->addColumn('detail', function ($laporan) {
                $btn = '<a href="' . route('laporan-selesai.show', $laporan->id_laporan_masalah) . '" class="btn btn-info btn-sm">Detail</a> ';
                return $btn;
            })
            ->rawColumns(['detail',])
            ->make(true);
    }

    public function list(Request $request)
    {
        $laporan = LaporanMasalahModel::where('status_pengajuan','pending')->orderBy('tanggal_laporan')->with('warga')->get();

        return DataTables::of($laporan)
            ->addIndexColumn()
            ->addColumn('nama_lengkap', function ($laporan) {
                return $laporan->warga->nama_lengkap;
            })
            ->addColumn('konfirmasi', function ($laporan) {

                $btn = '<form class="d-inline-block" method="POST" action="' . route('laporan.confirm', $laporan->id_laporan_masalah) . '">'
                    . csrf_field() .
                    '<button type="submit" class="btn btn-success btn-sm">Setujui</button></form> ';

                // Tombol Tolak
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('laporan.reject', $laporan->id_laporan_masalah) . '">'
                    . csrf_field() .
                    '<button type="submit" class="btn btn-danger btn-sm">Tolak</button></form> ';

                return $btn;
            })
            ->addColumn('detail', function ($laporan) {
                $btn = '<a href="' . route('laporan.show', $laporan->id_laporan_masalah) . '" class="btn btn-info btn-sm">Detail</a> ';
                return $btn;
            })
            ->rawColumns(['detail', 'konfirmasi'])
            ->make(true);
    }

    public function confirm($id)
{
    $laporan = LaporanMasalahModel::findOrFail($id);
    $laporan->status_pengajuan = 'wait';
    $laporan->save();

    return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikonfirmasi.');
}

public function approve($id)
{
    $laporan = LaporanMasalahModel::findOrFail($id);
    $laporan->status_pengajuan = 'approved';
    $laporan->save();

    return redirect()->route('laporan.index')->with('success', 'Laporan Selesai.');
}

public function reject($id)
{
    $laporan = LaporanMasalahModel::findOrFail($id);
    $laporan->status_pengajuan = 'rejected';
    $laporan->save();

    return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditolak.');
}

    public function show($id)
    {
        $laporan = LaporanMasalahModel::with('warga', 'feedback')->findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Laporan Masalah',
            'list' => ['Home', 'Laporan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Masalah'
        ];

        $activeMenu = 'laporan';

        return view('laporan.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'laporan' => $laporan,
            'activeMenu' => $activeMenu
        ]);
    }
    public function showFeedback($id)
    {
        $laporan = LaporanMasalahModel::with('warga', 'feedback')->findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Laporan Masalah',
            'list' => ['Home', 'Laporan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Masalah'
        ];

        $activeMenu = 'laporan';

        return view('laporan.feedback', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'laporan' => $laporan,
            'activeMenu' => $activeMenu
        ]);
    }
    public function showSelesai($id)
    {
        $laporan = LaporanMasalahModel::with('warga', 'feedback')->findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Laporan Masalah',
            'list' => ['Home', 'Laporan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Masalah'
        ];

        $activeMenu = 'laporan';

        return view('laporan.showSelesai', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'laporan' => $laporan,
            'activeMenu' => $activeMenu
        ]);
    }

    public function storeFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $feedback = new FeedbackLaporanModel();
        $feedback->id_laporan_masalah = $id;
        $feedback->feedback = $request->feedback;

        if ($request->hasFile('gambar')) {
            $imageName = 'feedback_' .$id.'_'. time() . '.' . $request->gambar->extension();
            // Create the directory if it doesn't exist
            if (!file_exists(public_path('images/feedback'))) {
                mkdir(public_path('images/feedback'), 0777, true);
            }
            $request->gambar->move(public_path('images/feedback'), $imageName);
            $feedback['gambar'] = 'feedback/' . $imageName;
        }


        $feedback->save();

        return redirect()->route('laporan.show', $id)->with('success', 'Feedback berhasil ditambahkan.');
    }


    // public function create()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Tambah Kegiatan',
    //         'list' => ['Home', 'Kegiatan', 'Tambah']
    //     ];

    //     $page = (object) [
    //         'title' => 'Tambah Kegiatan Baru',
    //     ];

    //     $rt = RtModel::all();
    //     $activeMenu = 'kegiatan';

    //     return view('Kegiatan.create', [
    //         'breadcrumb' => $breadcrumb,
    //         'page' => $page,
    //         'activeMenu' => $activeMenu,
    //         'rt' => $rt
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kegiatan' => 'required|string|max:100',
    //         'deskripsi' => 'required|string',
    //         'lokasi' => 'required|string',
    //         'tanggal' => 'required|date',
    //         'waktu' => 'required|date_format:H:i',
    //         'id_rt' => 'required|integer',
    //     ]);

    //     KegiatanModel::create($request->all());

    //     return redirect()->route('kegiatan.index')->with('success', 'Kegiatan baru telah ditambahkan');
    // }

    // public function edit($id)
    // {
    //     $kegiatan = KegiatanModel::findOrFail($id);
    //     $rt = RtModel::all();

    //     $breadcrumb = (object) [
    //         'title' => 'Edit Kegiatan',
    //         'list' => ['Home', 'Kegiatan', 'Edit']
    //     ];

    //     $page = (object) [
    //         'title' => 'Edit Kegiatan'
    //     ];

    //     $activeMenu = 'kegiatan';

    //     return view('Kegiatan.edit', [
    //         'breadcrumb' => $breadcrumb,
    //         'page' => $page,
    //         'kegiatan' => $kegiatan,
    //         'activeMenu' => $activeMenu,
    //         'rt' => $rt
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama_kegiatan' => 'required|string|max:100',
    //         'deskripsi' => 'required|string',
    //         'lokasi' => 'required|string',
    //         'tanggal' => 'required|date',
    //         'waktu' => 'required|date_format:H:i',
    //         'id_rt' => 'required|integer',
    //     ]);

    //     $kegiatan = KegiatanModel::findOrFail($id);
    //     $kegiatan->update($request->all());

    //     return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    // }

    // public function destroy($id)
    // {
    //     $laporan = LaporanMasalahModel::findOrFail($id);
    //     $laporan->delete();

    //     return redirect()->route('laporan.index')->with('success', 'Kegiatan berhasil dihapus');
    // }
}
