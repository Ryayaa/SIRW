@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ route('rw.edit', ['id' => $rw->id_rw]) }}" class="btn btn-sm btn-primary mt-1">Rubah Ketua RW</a>
        </div>
    </div>

    <div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($rw)
                <tr>
                    <td>{{ $rw->warga ? $rw->warga->nama_lengkap : 'Data tidak tersedia' }}</td>
                    <td>{{ $rw->status }}</td>
                    <td>
                        <a href="{{ route('rw.show', $rw->id_rw) }}" class="btn btn-warning">Detail</a>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data RW aktif</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
</div>
@endsection
