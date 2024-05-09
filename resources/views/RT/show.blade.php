@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($rt)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $rt->id_rt }}</td>
                    </tr>
                    <tr>
                        <th>Nomor RT</th>
                        <td>{{ $rt->no_rt }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $rt->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $rt->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $rt->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No Telepon</th>
                        <td>{{ $rt->no_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $rt->status }}</td>
                    </tr>
                    <tr>
                        <th>Awal Jabatan</th>
                        <td>{{ $rt->mulai_jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Akhir Jabatan</th>
                        <td>{{ $rt->akhir_jabatan }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('rt.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
