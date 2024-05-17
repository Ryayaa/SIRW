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
            <form method="POST" action="{{ url('/warga-sementara/' . $wargaSementara->id_warga_sementara) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Bukti KTP</label>
                    <div class="col-11">
                        <input type="file" class="form-control" id="bukti_ktp" name="bukti_ktp" accept="image/*">
                        @error('bukti_ktp')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Tanggal Lahir -->
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

                <!-- Nama Lengkap -->
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

                <!-- Alamat Asal -->
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

                <!-- Alamat Domisili -->
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

                <!-- Pekerjaan -->
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

                <!-- Status Perkawinan -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Status Perkawinan</label>
                    <div class="col-11">
                        <select class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                            <option value="Kawin" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Kawin'
                            ? 'selected' : '' }}>Kawin</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan', $wargaSementara->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('warga-sementara') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
