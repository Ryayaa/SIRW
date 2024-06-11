@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $warga->id_warga }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $warga->nik }}</td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $warga->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $warga->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $warga->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Alamat Domisili</th>
                    <td>{{ $warga->alamat_domisili }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $warga->pekerjaan }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>{{ $warga->status_perkawinan }}</td>
                </tr>
                <tr>
                    <th>Roles</th>
                    <td>{{ $warga->roles }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $warga->username }}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>{{ $warga->no_telepon }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $warga->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Status Hubungan</th>
                    <td>{{ $warga->status_hubungan }}</td>
                </tr>
                <tr>
                    <th>Keluarga</th>
                    <td>{{ $warga->keluarga ? $warga->keluarga->nomor_kk : 'Data tidak tersedia' }}</td>
                </tr>
                <tr>
                    <th>Bukti KTP</th>
                    <td>
                        @if($warga->bukti_ktp)
                            <img src="{{ asset('images/warga/ktp/'.$warga->bukti_ktp) }}" alt="Bukti KTP" width="150">
                        @else
                            Data tidak tersedia
                        @endif
                    </td>
                </tr>
            </table>
            <a href="{{ route('warga.index') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
