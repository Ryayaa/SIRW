<!-- resources/views/laporan/show.blade.php -->

@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Laporan</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-default my-4">Kembali</a>
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

            <h4 class="mt-5">Feedback</h4>
            @forelse ($laporan->feedback as $feedback)
                <div class="card mt-3">
                    <div class="card-body ">
                        <p>{{ $feedback->feedback }}</p>
                        <div class="text-center">

                            @if ($feedback->gambar)
                                <img src="{{ asset('images/'.$feedback->gambar) }}" alt="Gambar Feedback" class="img-fluid" style="max-width:75%; max-height:40vh; object-fit:contain;">
                            @endif
                        </div>
                        <small class="text-muted">{{ $feedback->created_at->format('d M Y, H:i') }}</small>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada feedback.</p>
            @endforelse

            @endempty


    </div>
</div>
@endsection
