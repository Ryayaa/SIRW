@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1>{{ $kegiatan->nama_kegiatan }}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($kegiatan->gambar)
                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                    <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                    <p class="card-text"><strong><i class="bi bi-geo-alt"></i> Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                    <p class="card-text"><strong><i class="bi bi-calendar"></i> Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
                    <p class="card-text"><strong><i class="bi bi-clock"></i> Waktu:</strong> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }} - Selesai</p>
                    <p class="card-text"><strong><i class="bi bi-person"></i> Pembuat:</strong> {{ $kegiatan->rt->nama_lengkap }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section></section>
@endsection
