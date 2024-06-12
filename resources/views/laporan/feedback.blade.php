<!-- resources/views/laporan/show.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Laporan</h3>
        </div>
        <div class="card-body">
            <form class="d-inline-block float-right my-4" method="POST"
                action="{{ route('laporan.approve', $laporan->id_laporan_masalah) }}">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Laporan Selesai</button>
            </form>
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
                                    <img src="{{ asset('images/' . $feedback->gambar) }}" alt="Gambar Feedback" class="img-fluid"
                                        style="max-width:75%; max-height:40vh; object-fit:contain;">
                                @endif
                            </div>
                            <small class="text-muted">{{ $feedback->created_at->format('d M Y, H:i') }}</small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada feedback.</p>
                @endforelse

                <h4>Tambah Feedback</h4>
                <form action="{{ route('laporan.feedback.store', $laporan->id_laporan_masalah) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea name="feedback" id="feedback" class="form-control @error('feedback') is-invalid @enderror" rows="4">{{ old('feedback') }}</textarea>
                        @error('feedback')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar (optional)</label>
                        <input type="file" name="gambar" id="gambar"
                            class="form-control-file @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                </form>
            @endempty

        </div>
    </div>
@endsection
