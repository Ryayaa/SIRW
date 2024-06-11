@extends('user-login.index')

@section('content')
<section>

    <div class="container mt-5">
        <div class="card mx-auto w-75 shadow-lg border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <small class="text-muted"><i class="bi bi-person me-1"></i> Pembuat: {{ $pengumuman->rt->nama_lengkap }}</small>
                    <small class="text-muted"><i class="bi bi-calendar me-1"></i> {{ $pengumuman->tanggal }}</small>
                </div>
                <h3 class="card-title text-center my-4">{{ $pengumuman->judul_pengumuman }}</h3>
                @if($pengumuman->gambar)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" class="img-fluid rounded" alt="Gambar Pengumuman">
                </div>
                @endif
                <p class="card-text mx-4">{{ $pengumuman->deskripsi }}</p>
            </div>
        </div>
    </div>
</section>

<style>
    
</style>
@endsection
