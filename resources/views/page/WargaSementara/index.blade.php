@extends('user-login.index')
@section('content')
<section class="container mt-5">
    <h1>Daftar Warga Sementara</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="mb-3">
        <a href="{{ route('warga-sementara_form.form') }}" class="btn btn-primary">Tambah Data Warga Sementara</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($wargaSementaraList->count() > 0)
                @foreach($wargaSementaraList as $warga)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $warga->nik }}</td>
                        <td>{{ $warga->nama_lengkap }}</td>
                        <td>
                            <a href="{{ route('warga-sementara_form.detail', $warga->id_warga_sementara) }}" class="btn btn-warning">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">Tidak ada warga sementara yang terdaftar</td>
                </tr>
            @endif
        </tbody>
    </table>
</section>
<section> </section>
@endsection
