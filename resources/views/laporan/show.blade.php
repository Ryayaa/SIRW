<!-- resources/views/laporan/show.blade.php -->

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Laporan</h3>
    </div>
    <div class="card-body">

        @empty($laporan)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Error!</h5> Data yang Anda cari tidak ditemukan.
            </div>
        @else
        <table class="table table-bordered">
                <tr>
                    <th>ID Laporan</th>
                    <td>{{ $laporan->id_laporan_masalah }}</td>
                </tr>
                <tr>
                    <th>Nama Laporan</th>
                    <td>{{ $laporan->judul_laporan }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $laporan->deskripsi }}</td>
                    </tr>
                <tr>
                    <th>Lokasi</th>
                    <td>{{ $laporan->lokasi }}</td>
                    </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $laporan->tanggal }}</td>
                    </tr>
                <tr>
                    <th>Waktu</th>
                    <td>{{ $laporan->waktu }}</td>
                    </tr>
            </table>

            
            @endempty

        <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-default my-4">Kembali</a>
    </div>
</div>
@endsection
