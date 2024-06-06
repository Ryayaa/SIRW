@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Kas</h3>
        </div>
        <div class="card-body">
            @empty($kas)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Error!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th>ID Kas</th>
                        <td>{{ $kas->id_kas }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $kas->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Masuk</th>
                        <td>{{ $kas->jumlah_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Keluar</th>
                        <td>{{ $kas->jumlah_keluar }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $kas->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $kas->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>ID RT</th>
                        <td>{{ $kas->id_rt }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('kas.index') }}" class="btn btn-sm btn-default">Kembali</a>
        </div>
    </div>
@endsection
