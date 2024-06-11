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
                    <th>Nama Laporan</th>
                    <td>{{ $laporan->judul_laporan }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $laporan->deskripsi }}</td>
                    </tr>

                    <th>Tanggal</th>
                    <td>{{ $laporan->tanggal_laporan }}</td>
                    </tr>
                <tr>
                    <th>Gambar</th>
                        <td>

                            @if ($laporan->gambar)
                                <a href="{{ asset('images/' . $laporan->gambar) }}" data-toggle="lightbox" data-title="Laporan"
                                    data-gallery="gallery">
                                    <img src="{{ asset('images/' . $laporan->gambar) }}" alt="Laporan" class=""
                                        width="500">
                                </a>
                            @else
                                <span class="text-danger">Gambar tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
            </table>


            @endempty

        <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-default my-4">Kembali</a>
    </div>
</div>
@endsection
