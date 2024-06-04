@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Kegiatan</h3>
        </div>
        <div class="card-body">
            @empty($kegiatan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Error!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th>ID Kegiatan</th>
                        <td>{{ $kegiatan->id_kegiatan_warga }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $kegiatan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{ $kegiatan->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $kegiatan->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Waktu</th>
                        <td>{{ $kegiatan->waktu }}</td>
                    </tr>
                    <tr>
                        <th>ID RT</th>
                        <td>{{ $kegiatan->id_rt }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-default">Kembali</a>
        </div>
    </div>
@endsection
