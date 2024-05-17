@extends('user-login.index')

@section('content')
<section></section>
<div class="container">
    <div class="row my-4">
        <div class="col-12 text-center">
            <h2>Struktur Pengurus RW</h2>
        </div>
    </div>

    <div class="row my-4 justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Ketua RW</h3>
                </div>
                <div class="card-body">
                    <p>Nama: John Doe</p>
                    <p>Alamat: Jl. Mawar No. 10</p>
                    <p>Telepon: 081234567890</p>
                </div>
                {{-- <div class="card-body">
                    <p>Nama: {{ $rw->nama_lengkap }}</p>
                    <p>Alamat: {{ $rw->alamat }}</p>
                    <p>Telepon: {{ $rw->no_telepon }}</p>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-12 text-center">
            <h3>Ketua RT</h3>
        </div>
    </div>

    <div class="row my-2 justify-content-center">
        {{-- @foreach ($rts as $rt)
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-success text-white">
                    <h4>RT {{ $rt->no_rt }}</h4>
                </div>
                <div class="card-body">
                    <p>Nama: {{ $rt->nama_lengkap }}</p>
                    <p>Alamat: {{ $rt->alamat }}</p>
                    <p>Telepon: {{ $rt->no_telepon }}</p>
                </div>
            </div>
        </div>
    @endforeach --}}
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-success text-white">
                    <h4>RT 01</h4>
                </div>
                <div class="card-body">
                    <p>Nama: Jane Smith</p>
                    <p>Alamat: Jl. Mawar No. 11</p>
                    <p>Telepon: 081234567891</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-info text-white">
                    <h4>RT 02</h4>
                </div>
                <div class="card-body">
                    <p>Nama: Mike Johnson</p>
                    <p>Alamat: Jl. Mawar No. 12</p>
                    <p>Telepon: 081234567892</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-warning text-white">
                    <h4>RT 03</h4>
                </div>
                <div class="card-body">
                    <p>Nama: Emily Davis</p>
                    <p>Alamat: Jl. Mawar No. 13</p>
                    <p>Telepon: 081234567893</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-danger text-white">
                    <h4>RT 04</h4>
                </div>
                <div class="card-body">
                    <p>Nama: Emily Davis</p>
                    <p>Alamat: Jl. Mawar No. 13</p>
                    <p>Telepon: 081234567893</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-sm-8">
            <div class="card mb-4">
                <div class="card-header text-center bg-danger text-white">
                    <h4>RT 04</h4>
                </div>
                <div class="card-body">
                    <p>Nama: Emily Davis</p>
                    <p>Alamat: Jl. Mawar No. 13</p>
                    <p>Telepon: 081234567893</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section></section>
@endsection
