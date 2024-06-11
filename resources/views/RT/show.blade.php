@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ route('rw.index') }}" class="btn btn-sm btn-primary mt-1">Kembali</a>
        </div>
    </div>

    <div class="card-body">
        <h4>Detail RT</h4>
        <table class="table table-bordered">
            <tr>
                <th>No RT</th>
                <td>{{ $rt->no_rt }}</td>
            </tr>
        </table>

        @if ($rt->ketuaRt)
            <h4 class="mt-4">Detail Ketua RT</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $rt->ketuaRt->warga->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Mulai Jabatan</th>
                    <td>{{ $rt->ketuaRt->mulai_jabatan }}</td>
                </tr>
                <tr>
                    <th>Akhir Jabatan</th>
                    <td>{{ $rt->ketuaRt->akhir_jabatan ?? 'Masih Menjabat' }}</td>
                </tr>
            </table>
        @else
            <h4 class="mt-4">Belum ada Ketua RT</h4>
        @endif
    </div>
</div>
@endsection
