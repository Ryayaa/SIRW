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
