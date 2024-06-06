@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <!-- Tombol untuk menuju ke halaman pengajuan bansos -->
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penerima/' . $idBansos . '/create/') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('penerima.store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Nama Warga</th>
                            <th>Skor MOORA</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking as $index => $id_penerima)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \App\Models\PenerimaBansosModel::find($id_penerima)->warga->nama_lengkap }}</td>
                                <td>{{ $moora[$id_penerima] }}</td>
                                <td>
                                    <a href="{{ route('penerima.show', $id_penerima) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn btn-default" href="{{ url('penerima/' . $idBansos . '/list/') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection
