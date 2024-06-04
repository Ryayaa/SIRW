@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="mb-4">Detail Pengumuman</h1>
    </div>
    <div class="card mx-auto w-75">
        <div class="card-body ">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted"><i class="bi bi-person"></i> Pembuat: {{ $pengumuman->rt->nama_lengkap }}</small>
                <small class="text-muted"><i class="bi bi-calendar"></i> {{ $pengumuman->tanggal }}</small>
            </div>
            <h3 class="card-title text-center my-4">{{ $pengumuman->judul_pengumuman }}</h3>
            @if($pengumuman->gambar)
            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" class="card-img-top mx-4 mb-4" alt="Gambar Pengumuman">
            @endif
            <p class="card-text mx-4">{{ $pengumuman->deskripsi }}</p>
        </div>
    </div>
</div>
<section></section>
@endsection
