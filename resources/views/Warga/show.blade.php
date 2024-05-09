@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($warga)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $warga->id_warga }}</td>
                    </tr>
                    <tr>
                        <th>NKK</th>
                        <td>{{ $warga->keluarga->nomor_kk }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $warga->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $warga->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $warga->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $warga->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Domisili</th>
                        <td>{{ $warga->alamat_domisili }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $warga->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>{{ $warga->status_perkawinan }}</td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td>{{ $warga->level }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('warga.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
