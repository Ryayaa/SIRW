@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('warga_sementara.update', $wargaSementara->id_warga_sementara) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">NIK</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ old('nik', $wargaSementara->nik) }}" required>
                        @error('nik')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Lengkap</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $wargaSementara->nama_lengkap) }}" required>
                        @error('nama_lengkap')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Lahir</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $wargaSementara->tanggal_lahir) }}" required>
                        @error('tanggal_lahir')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-11">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin', $wargaSementara->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $wargaSementara->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat Asal</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat_asal" name="alamat_asal"
                            value="{{ old('alamat_asal', $wargaSementara->alamat_asal) }}" required>
                        @error('alamat_asal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat Domisili</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili"
                            value="{{ old('alamat_domisili', $wargaSementara->alamat_domisili) }}" required>
                        @error('alamat_domisili')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Pekerjaan</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $wargaSementara->pekerjaan) }}" required>
                        @error('pekerjaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Status Perkawinan</label>
                    <div class="col-11">
                        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                            <option value="">Pilih Status Perkawinan</option>
                            <option value="Kawin" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Masuk</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $wargaSementara->tanggal_masuk) }}" required>
                        @error('tanggal_masuk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Password</label>
                    <div class="col-11">
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Bukti KTP</label>
                    <div class="col-11">
                        <input type="file" class="form-control-file" id="bukti_ktp" name="bukti_ktp">
                        @if($wargaSementara->bukti_ktp)
                            <img src="{{ url('images/' . $wargaSementara->bukti_ktp) }}" alt="Current Image" width="100" class="mt-2">
                        @endif
                        @error('bukti_ktp')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ route('warga_sementara.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
