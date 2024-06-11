@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (empty($pengumuman))
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>ID Pengumuman</th>
                            <td>{{ $pengumuman->id_pengumuman }}</td>
                        </tr>
                        <tr>
                            <th>Judul Pengumuman</th>
                            <td>{{ $pengumuman->judul_pengumuman }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $pengumuman->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Gambar</th>
                            <td>
                                @if($pengumuman->gambar)
                                    <img src="{{ asset('images/pengumuman/'.$pengumuman->gambar) }}" alt="{{ $pengumuman->judul_pengumuman }}" class="img-fluid" width="100">
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>No RT</th>
                            <td>{{ $pengumuman->rt->no_rt }}</td>
                        </tr>
                    </table>
                </div>
            @endif
            <a href="{{ route('pengumuman.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
@endpush

@push('js')
@endpush
