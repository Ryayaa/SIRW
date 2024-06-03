@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Detail Laporan Masalah</h1>
    </div>
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <h5>{{ $laporan->judul_laporan }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $laporan->deskripsi }}</p>
            <p class="card-text"><small class="text-muted"><i class="bi bi-calendar"></i> {{ $laporan->tanggal_laporan }}</small></p>
            @if($laporan->status_hide == 't')
            <p class="card-text"><small class="text-muted">Dilaporkan oleh: {{ $laporan->warga->nama_lengkap }}</small></p>
            @else
            <p class="card-text"><small class="text-muted">Dilaporkan oleh: <em>Anonymous</em></small></p>
            @endif
            @if($laporan->gambar)
            <img src="{{ asset('storage/' . $laporan->gambar) }}" class="img-fluid mt-3" alt="Gambar Laporan">
            @endif
        </div>
    </div>
</div>
<section></section>
@endsection
