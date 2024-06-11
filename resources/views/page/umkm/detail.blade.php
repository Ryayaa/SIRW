@extends('user-login.index')

@section('content')
<section>

    <div class="container mt-5">
        <div class="section-header text-center">
            <h1 class="">{{ $umkm->nama_umkm }}</h1>
        </div>

        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if($umkm->gambar)
                    <img src="{{ asset('storage/'.$umkm->gambar) }}" class="img-fluid mb-3" alt="{{ $umkm->nama_umkm }}">
                    @else
                    <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3" alt="Gambar tidak tersedia">
                    @endif
                    <p><strong>Alamat:</strong> {{ $umkm->alamat }}</p>
                    <p><strong>No Telepon:</strong> {{ $umkm->no_telepon }}</p>
                    <p><strong>Deskripsi:</strong> {{ $umkm->deskripsi }}</p>
                    <p>Pemilik: {{$umkm->warga->nama_lengkap}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
