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
            <form method="POST" action="{{ url('/tamu/' . $tamu->id_tamu) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Lengkap</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $tamu->nama_lengkap) }}" required>
                        @error('nama_lengkap')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Lahir</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $tamu->tanggal_lahir) }}" required>
                        @error('tanggal_lahir')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-11">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ old('jenis_kelamin', $tamu->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $tamu->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat KTP</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp"
                            value="{{ old('alamat_ktp', $tamu->alamat_ktp) }}" required>
                        @error('alamat_ktp')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat Menetap</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat_menetap" name="alamat_menetap"
                            value="{{ old('alamat_menetap', $tamu->alamat_menetap) }}" required>
                        @error('alamat_menetap')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nomor Telepon</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ old('no_telepon', $tamu->no_telepon) }}" required>
                        @error('no_telepon')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Masuk</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $tamu->tanggal_masuk) }}" required>
                        @error('tanggal_masuk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Keluar</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                            value="{{ old('tanggal_keluar', $tamu->tanggal_keluar) }}" required>
                        @error('tanggal_keluar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('tamu') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
