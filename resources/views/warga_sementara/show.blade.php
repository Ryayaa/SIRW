@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Warga Sementara</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($wargaSementara)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Warga Sementara</th>
                        <td>{{ $wargaSementara->id_warga_sementara }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $wargaSementara->username }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $wargaSementara->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $wargaSementara->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $wargaSementara->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $wargaSementara->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Asal</th>
                        <td>{{ $wargaSementara->alamat_asal }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Domisili</th>
                        <td>{{ $wargaSementara->alamat_domisili }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $wargaSementara->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>{{ $wargaSementara->status_perkawinan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $wargaSementara->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Status Pengajuan</th>
                        <td>{{ $wargaSementara->status_pengajuan }}</td>
                    </tr>
                    <tr>
                        <th>ID Warga</th>
                        <td>{{ $wargaSementara->id_warga }}</td>
                    </tr>
                    <tr>
                        <th>Bukti KTP</th>
                        <td>
                            @if($wargaSementara->bukti_ktp)
                                <img src="{{ asset('images/'.$wargaSementara->bukti_ktp) }}" alt="{{ $wargaSementara->nama_lengkap }}" width="200">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                    </tr>
                </table>
            @endempty
            <a href="{{ route('warga_sementara.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
