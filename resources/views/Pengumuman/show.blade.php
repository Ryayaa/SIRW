@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($pengumuman)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
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
                                <img src="{{ asset('images/'.$pengumuman->gambar) }}" alt="{{ $pengumuman->judul_pengumuman }}" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $pengumuman->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>ID RT</th>
                        <td>{{ $pengumuman->id_rt }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('pengumuman.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
