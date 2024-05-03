@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($bansos)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Bansos</th>
                        <td>{{ $bansos->id_bansos }}</td>
                    </tr>
                    <tr>
                        <th>Nama Bansos</th>
                        <td>{{ $bansos->nama_bansos }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $bansos->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Gambar</th>
                        <td><img src="{{ asset('storage/'.$bansos->gambar) }}" alt="{{ $bansos->nama_bansos }}" width="100"></td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('bansos.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
