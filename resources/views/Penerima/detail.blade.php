@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <h5><strong>Nama Warga:</strong> {{ $penerima->warga->nama_lengkap }}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Subkriteria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penerima->nilaiA as $nilai)
                        <tr>
                            <td>{{ $nilai->kriteria->nama }}</td>
                            <td>{{ $nilai->nilai->subkriteria }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <a class="btn btn btn-default" href="{{ url('penerima/' . $penerima->id_bansos . '/list/') }}">Kembali</a>
        </div>
    </div>
@endsection
