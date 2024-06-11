<!-- resources/views/warga/edit.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{ route('warga.update', $warga->id_warga) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $warga->nik }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $warga->nama_lengkap }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $warga->tanggal_lahir }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control" value="{{ $warga->jenis_kelamin }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat_domisili">Alamat Domisili</label>
                    <input type="text" name="alamat_domisili" class="form-control" value="{{ $warga->alamat_domisili }}" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ $warga->pekerjaan }}" required>
                </div>
                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan" class="form-control" value="{{ $warga->status_perkawinan }}" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $warga->username }}" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ $warga->no_telepon }}" required>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $warga->tempat_lahir }}" required>
                </div>
                <div class="form-group">
                    <label for="status_hubungan">Status Hubungan</label>
                    <input type="text" name="status_hubungan" class="form-control" value="{{ $warga->status_hubungan }}" required>
                </div>
                <div class="form-group">
                    <label for="id_keluarga">Keluarga</label>
                    <select name="id_keluarga" class="form-control" required>
                        @foreach($keluarga as $kel)
                            <option value="{{ $kel->id_keluarga }}" {{ $warga->id_keluarga == $kel->id_keluarga ? 'selected' : '' }}>{{ $kel->nomor_kk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bukti_ktp">Bukti KTP</label>
                    <input type="file" name="bukti_ktp" class="form-control">
                    @if($warga->bukti_ktp)
                        <img src="{{ asset('images/warga/ktp/'.$warga->bukti_ktp) }}" alt="Bukti KTP" width="150">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
