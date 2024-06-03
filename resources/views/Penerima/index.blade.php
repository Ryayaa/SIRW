@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Bantuan Sosial</th>
                        <th>Penerima</th>
                        <th>Pengajuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bansosList as $bansos)
                        <tr>
                            <td><a href="{{ url('/penerima/' . $bansos->id_bansos . '/list') }}">{{ $bansos->nama_bansos }}</a></td>
                            <td>{{ $bansos->penerimas_diterima_count }}</td>
                            <td>{{ $bansos->penerimas_pending_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
