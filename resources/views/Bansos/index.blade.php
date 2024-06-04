@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('bansos.create') }}">Tambah Bansos Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_bansos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Bansos</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bansosList as $bansos)
                        <tr>
                            <td>{{ $bansos->id_bansos }}</td>
                            <td><a href="{{ url('/bansos/' . $bansos->id_bansos) }}">{{ $bansos->nama_bansos }}</a></td>
                            <td>{{ $bansos->gambar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
