@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($umkm)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID UMKM</th>
                        <td>{{ $umkm->id_umkm }}</td>
                    </tr>
                    <tr>
                        <th>Nama UMKM</th>
                        <td>{{ $umkm->nama_umkm }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $umkm->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>{{ $umkm->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td>
                            @if($umkm->gambar)
                                <img src="{{ asset('images/'.$umkm->gambar) }}" alt="{{ $umkm->nama_umkm }}" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>ID Warga</th>
                        <td>{{ $umkm->id_warga }}</td>
                    </tr>
                    <tr>
                        <th>Status UMKM</th>
                        <td>{{ $umkm->status_umkm ? 'Aktif' : 'Non-Aktif' }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('umkm.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
