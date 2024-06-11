<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use App\Models\RtModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KasController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kas',
            'list' => ['Home', 'Kas']
        ];
        $page = (object) [
            'title' => 'Daftar Kas',
        ];
        $activeMenu = 'kas';

        // Calculate saldo
        $saldo = $this->getSaldo();

        return view('Kas.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'saldo' => $saldo
        ]);
    }

    // ... existing methods ...

    public function getSaldo()
    {
        $jumlahMasuk = KasModel::sum('jumlah_masuk');
        $jumlahKeluar = KasModel::sum('jumlah_keluar');
        $saldo = $jumlahMasuk - $jumlahKeluar;

        return $saldo;
    }

    public function list(Request $request)
    {
        $kas = KasModel::select('id_kas', 'jumlah', 'jumlah_masuk', 'jumlah_keluar', 'tanggal', 'id_rt');

        return DataTables::of($kas)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kas) {
                $btn = '<a href="' . url('/kas/' . $kas->id_kas) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kas/' . $kas->id_kas . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kas/' . $kas->id_kas) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kas',
            'list'  => ['Home', 'Kas', 'Tambah']
        ];
    
        $page = (object) [
            'title' => 'Tambah Kas'
        ];
    
        $activeMenu = 'kas';
    
        // Retrieve the list of RTs from the database
        $rt = RtModel::all();
    
        return view('Kas.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt // Pass the $rt variable to the view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_masuk' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
            'id_rt' => 'required|exists:rt,id_rt'
        ]);
    
        // Simpan data yang diperlukan
        $data = $request->only(['jumlah_masuk', 'tanggal', 'id_rt','keterangan']);
        $data['jumlah_keluar'] = 0; // Nilai default
        $data['jumlah'] = 0; // Nilai default
    
        KasModel::create($data);
    
        return redirect('/kas')->with('success', 'Kas berhasil disimpan');
    }

    public function show($id)
    {
        $kas = KasModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Kas',
            'list'  => ['Home', 'Kas', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Kas'
        ];

        $activeMenu = 'kas';

        return view('Kas.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kas' => $kas,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit($id)
    {
        $kas = KasModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit Kas',
            'list'  => ['Home', 'Kas', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Kas'
        ];

        $activeMenu = 'kas';

        return view('Kas.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kas' => $kas,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'jumlah_masuk' => 'required|integer',
            'jumlah_keluar' => 'required|integer',
            'tanggal' => 'required|date',
            'id_rt' => 'required|exists:rt,id_rt'
        ]);

        $kas = KasModel::findOrFail($id);
        $kas->update($request->all());

        return redirect('/kas')->with('success', 'Kas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kas = KasModel::findOrFail($id);
        $kas->delete();

        return redirect()->route('kas.index')->with('success', 'Kas berhasil dihapus');
    }
    public function createTransaksi()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Transaksi Kas',
            'list'  => ['Home', 'Kas', 'Tambah Transaksi']
        ];
    
        $page = (object) [
            'title' => 'Tambah Transaksi Kas'
        ];
    
        $activeMenu = 'kas';
    
        // Retrieve the list of RTs from the database
        $rt = RtModel::all();
    
        return view('Kas.transaksi_create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'rt' => $rt // Pass the $rt variable to the view
        ]);
    }
    
    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'jumlah_keluar' => 'required|integer',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'id_rt' => 'required|exists:rt,id_rt'
        ]);
    
        // Create a new transaction entry in the KasModel
        KasModel::create([
            'jumlah' => 0,
            'jumlah_keluar' => $request->jumlah_keluar,
            'jumlah_masuk' => 0, // Set jumlah_masuk to 0
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'id_rt' => $request->id_rt,
            // Add any other necessary fields
        ]);
    
        return redirect()->route('kas.index')->with('success', 'Transaksi kas berhasil disimpan');
    }

    public function history()
{
    $breadcrumb = (object) [
        'title' => 'History Kas',
        'list' => ['Home', 'Kas', 'History']
    ];
    $page = (object) [
        'title' => 'History Kas',
    ];
    $activeMenu = 'kas';

    $kasMasuk = KasModel::where('jumlah_masuk', '>', 0)->orderBy('tanggal', 'desc')->get();
    $kasKeluar = KasModel::where('jumlah_keluar', '>', 0)->orderBy('tanggal', 'desc')->get();

    return view('Kas.history', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'activeMenu' => $activeMenu,
        'kasMasuk' => $kasMasuk,
        'kasKeluar' => $kasKeluar
    ]);
}
    
}
