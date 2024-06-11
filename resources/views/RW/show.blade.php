@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered mt-3">
            <tr>
                <th>Nama</th>
                <td>{{ $rw->warga ? $rw->warga->nama_lengkap : 'Data tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $rw->warga ? ($rw->warga->jenis_kelamin == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan') : 'Data tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $rw->warga ? $rw->warga->alamat_domisili : 'Data tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $rw->warga ? $rw->warga->no_telepon : 'Data tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $rw->status }}</td>
            </tr>
            <tr>
                <th>Mulai Jabatan</th>
                <td>{{ $rw->mulai_jabatan }}</td>
            </tr>
            <tr>
                <th>Akhir Jabatan</th>
                <td>{{ $rw->akhir_jabatan }}</td>
            </tr>
        </table>

        <a href="{{ route('rw.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
</div>
@endsection
