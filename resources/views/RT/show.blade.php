@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($rw)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $rw->id_rw }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $rw->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $rw->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $rw->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $rw->status }}</td>
                    </tr>
                    <tr>
                        <th>Awal Jabatan</th>
                        <td>{{ $rw->mulai_jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Akhir Jabatan</th>
                        <td>{{ $rw->akhir_jabatan }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('rw.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
