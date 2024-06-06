@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <p>{{ $tamu->nama_lengkap }}</p>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <p>{{ $tamu->tempat_lahir }}</p>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <p>{{ $tamu->tanggal_lahir }}</p>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <p>{{ $tamu->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            </div>
            <div class="form-group">
                <label for="alamat_ktp">Alamat KTP:</label>
                <p>{{ $tamu->alamat_ktp }}</p>
            </div>
            <div class="form-group">
                <label for="alamat_menetap">Alamat Menetap:</label>
                <p>{{ $tamu->alamat_menetap }}</p>
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon:</label>
                <p>{{ $tamu->no_telepon }}</p>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <p>{{ $tamu->tanggal_masuk }}</p>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Tanggal Keluar:</label>
                <p>{{ $tamu->tanggal_keluar }}</p>
            </div>
            <div class="form-group">
                <label for="bukti_ktp">Bukti KTP:</label>
                <p> @if ($tamu->bukti_ktp)
                    <img src="{{ asset('images/' . $tamu->bukti_ktp) }}" alt="Bukti KTP" class="img-fluid" style="max-width: 300px;">
                @else
                    <p>Gambar tidak tersedia</p>
                @endif
            </div>
            <a href="{{ route('tamu.index') }}" class="btn btn-default">Kembali</a>
        </div>
    </div>
@endsection
