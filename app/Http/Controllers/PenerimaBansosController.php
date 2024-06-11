<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\KriteriaBansosModel;
use App\Models\NilaiAlternatifModel;
use App\Models\NilaiKriteriaModel;
use App\Models\PenerimaBansosModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenerimaBansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Daftar bantuan sosial',
        ];
        $activeMenu = 'penerima';


        $bansosList = Bansos::withCount([
            'penerimas as penerimas_diterima_count' => function ($query) {
                $query->where('status', 'diterima');
            },
            'penerimas as penerimas_pending_count' => function ($query) {
                $query->where('status', 'pending');
            }
        ])->get();

        return view('Penerima.index', [

            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'bansosList' => $bansosList
        ]);
    }

    private function calculateMoora($status, $idBansos)
    {
        // Get kriteria for the specified bansos
        $kriteria = KriteriaBansosModel::where('id_bansos', $idBansos)->get();

        // Get alternatif where penerima status is $status and id_bansos is $idBansos
        $alternatifs = NilaiAlternatifModel::whereHas('penerima', function($query) use ($status, $idBansos) {
            $query->where('status', $status)->where('id_bansos', $idBansos);
        })->with('nilai')->get()->groupBy('id_penerima');

        // Step 1: Matrix Normalization
        $normalization = [];
        foreach ($kriteria as $k) {
            $sumSquares = 0;
            foreach ($alternatifs as $alternatif) {
                foreach ($alternatif as $a) {
                    if ($a->id_kriteria == $k->id_kriteria) {
                        $sumSquares += pow($a->nilai->nilai, 2); // Accessing the 'nilai' attribute
                    }
                }
            }
            $sqrtSumSquares = sqrt($sumSquares);
            foreach ($alternatifs as $id_penerima => $alternatif) {
                foreach ($alternatif as $a) {
                    if ($a->id_kriteria == $k->id_kriteria) {
                        $normalization[$id_penerima][$k->id_kriteria] = $a->nilai->nilai / $sqrtSumSquares; // Accessing the 'nilai' attribute
                    }
                }
            }
        }

        // Step 2: Weighted Normalized Decision Matrix
        $weighted = [];
        foreach ($normalization as $id_penerima => $norm) {
            foreach ($norm as $id_kriteria => $value) {
                $kriteriaItem = $kriteria->where('id_kriteria', $id_kriteria)->first();
                $weighted[$id_penerima][$id_kriteria] = $value * $kriteriaItem->bobot;
            }
        }

        // Step 3: Calculate MOORA
        $moora = [];
        foreach ($weighted as $id_penerima => $weight) {
            $benefit = 0;
            $cost = 0;
            foreach ($weight as $id_kriteria => $value) {
                $kriteriaItem = $kriteria->where('id_kriteria', $id_kriteria)->first();
                if ($kriteriaItem->jenis == 'Benefit') {
                    $benefit += $value;
                } else {
                    $cost += $value;
                }
            }
            $moora[$id_penerima] = $benefit - $cost;
        }

        // Step 4: Ranking
        arsort($moora);
        $ranking = array_keys($moora);

        return compact('ranking', 'moora');
    }



    public function list($idBansos)
    {
        $breadcrumb = (object) [
            'title' => 'Penerima Bantuan Sosial',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Data Warga yang menerima bantuan sosial',
        ];
        $activeMenu = 'penerima';

        $result = $this->calculateMoora('diterima', $idBansos);
        $ranking = $result['ranking'];
        $moora = $result['moora'];

        return view('penerima.list', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'ranking' => $ranking,
            'moora' => $moora,
            'idBansos' => $idBansos
        ]);
    }


    public function pengajuan($idBansos){
        $breadcrumb = (object) [
            'title' => 'Tambah Data Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Daftar Pengajuan bantuan sosial',
        ];
        $activeMenu = 'penerima';

        $result = $this->calculateMoora('pending', $idBansos);
        $ranking = $result['ranking'];
        $moora = $result['moora'];


        return view('Penerima.pengajuan', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'ranking' => $ranking,
            'moora' => $moora,
            'idBansos' => $idBansos
        ]);
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'penerima' => 'required|array',
            'penerima.*' => 'exists:penerima_bansos,id_penerima'
        ]);

        $selectedPenerimaIds = $request->input('penerima');

        PenerimaBansosModel::whereIn('id_penerima', $selectedPenerimaIds)->update(['status' => 'diterima']);

        return redirect('/penerima')->with('success', 'Data penerima berhasil disimpan');
    }

    public function create($idBansos){
        $breadcrumb = (object) [
            'title' => 'Tambah Data Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Daftar Pengajuan bantuan sosial',
        ];
        $activeMenu = 'penerima';

        $krireria = KriteriaBansosModel::where('id_bansos', $idBansos)->with(['subkriteria'])->get();
        $wargaList = WargaModel::whereNotExists(function ($query) use ($idBansos) {
            $query->select(DB::raw(1))
                ->from('penerima_bansos')
                ->whereColumn('warga.id_warga', 'penerima_bansos.id_warga')
                ->where('penerima_bansos.id_bansos', $idBansos)
                ->whereIn('penerima_bansos.status', ['pending', 'diterima']);
        })
        ->whereNotIn('warga.id_warga', function ($query) use ($idBansos) {
            $query->select('id_warga')
                ->from('penerima_bansos')
                ->where('id_bansos', $idBansos);
        })
        ->whereNotIn('warga.id_keluarga', function ($query) use ($idBansos) {
            $query->select('id_keluarga')
                ->from('warga')
                ->whereIn('id_warga', function ($subquery) use ($idBansos) {
                    $subquery->select('id_warga')
                        ->from('penerima_bansos')
                        ->where('id_bansos', $idBansos);
                });
        })
        ->get();



        return view('Penerima.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'idBansos' => $idBansos,
            'wargaList' => $wargaList,
            'kriteria' => $krireria
        ]);
    }

    public function save(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_bansos' => 'required|exists:bansos,id_bansos',
            'id_warga' => 'required|exists:warga,id_warga',
            'id_kriteria' => 'required|array',
            'id_kriteria.*' => 'required|exists:nilai_kriteria,id_nilai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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
                'id_warga' => $request->id_warga,
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

            return redirect()->back()->with('success', 'Data penerima bantuan sosial berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }



    // Menampilkan detail user
    public function show($id){
        $breadcrumb = (object) [
            'title' => 'Detail Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Detail Penerima Bansos',
        ];
        $activeMenu = 'penerima';
        $penerima = PenerimaBansosModel::with(['nilaiA', 'nilaiA.kriteria', 'nilaiA.nilai'])->find($id);
        if (!$penerima) {
            return redirect()->back()->withErrors(['Penerima tidak ditemukan']);
        }
        return view('Penerima.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'penerima' => $penerima,
        ]);
    }

    public function accept($id)
    {
        $penerima = PenerimaBansosModel::find($id);
        if ($penerima) {
            $penerima->status = 'diterima';
            $penerima->save();
        }

        return redirect(url('penerima/' . $penerima->id_bansos . '/pengajuan'))->with('success', 'Penerima berhasil diterima');
    }

    public function reject($id)
    {
        $penerima = PenerimaBansosModel::find($id);
        if ($penerima) {
            $penerima->status = 'ditolak';
            $penerima->save();
        }

        return redirect(url('penerima/' . $penerima->id_bansos . '/pengajuan'))->with('success', 'Penerima berhasil ditolak');
    }


    public function detail($id){
        $breadcrumb = (object) [
            'title' => 'Detail Penerima Bansos',
            'list' => ['Home', 'Penerima Bansos']
        ];
        $page = (object) [
            'title' => 'Detail Penerima Bansos',
        ];
        $activeMenu = 'penerima';
        $penerima = PenerimaBansosModel::with(['nilaiA', 'nilaiA.kriteria', 'nilaiA.nilai'])->find($id);
        if (!$penerima) {
            return redirect()->back()->withErrors(['Penerima tidak ditemukan']);
        }
        return view('Penerima.detail', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'penerima' => $penerima,
        ]);

    }
}
