@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Detail Bantuan Sosial</h1>
    </div>
    <div class="row my-2">
        <div class="col-12 mb-4">
            <div class="card">
                <img src="{{ asset('images/'.$bansos->gambar) }}" class="card-img-top" alt="{{ $bansos->nama_bansos }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $bansos->nama_bansos }}</h4>
                    <h5><b>Deskripsi</b></h5>
                    <p class="card-text">{{ $bansos->deskripsi }}</p>
                    <h5><b>Kriteria</b></h5>
                    @foreach ($bansos->kriteria as $k)
                        <p class="card-text">{{$k->nama}}</p>
                    @endforeach
                    <a href="/bansos-list" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section></section>
@endsection
