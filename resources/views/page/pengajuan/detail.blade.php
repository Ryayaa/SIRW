<title>Detail Pengajuan Bantuan Sosial</title>
@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Detail Pengaju Bantuan Sosial</h1>
    </div>
    <div class="row my-2">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nama: {{ $pengajuan->warga->nama_lengkap }}</h5>
                    <p class="card-text">Status: {{ $pengajuan->status }}</p>
                    @foreach($pengajuan->nilaiA as $nilai)
                        <p>{{ $nilai->kriteria->nama }}: {{ $nilai->kriteria->subkriteria->find($nilai->id_nilai)->subkriteria }}</p>
                    @endforeach
                    <a href="/pengajuan-list" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section></section>
@endsection
