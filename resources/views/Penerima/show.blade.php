@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($penerima)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $penerima->id_penerima_bansos }}</td>
                    </tr>
                    <tr>
                        <th>ID Warga</th>
                        <td>{{ $penerima->warga->id_warga }}</td>
                    </tr>
                    <tr>
                        <th>NKK</th>
                        <td>{{ $penerima->warga->NKK }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $penerima->warga->NIK }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $penerima->warga->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $penerima->warga->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $penerima->warga->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $penerima->warga->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>{{ $penerima->warga->status_perkawinan }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('penerima.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
