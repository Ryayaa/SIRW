@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Daftar Bansos</h1>
    </div>
    <div class="row my-2">
        @foreach($bansosList as $bansos)
        <div class="col-12 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$bansos->gambar) }}" class="card-img-top" alt="{{ $bansos->nama_bansos }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $bansos->nama_bansos }}</h5>
                    <p class="card-text">{{ $bansos->deskripsi }}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<section></section>
@endsection
