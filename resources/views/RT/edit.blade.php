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
            <form method="POST" action="{{ url('/rt/' . $rt->id_rt) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nomor RT</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="no_rt" name="no_rt"
                            value="{{ old('no_rt', $rt->no_rt) }}" required>
                        @error('no_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Lengkap</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $rt->nama_lengkap) }}" required>
                        @error('nama_lengkap')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-11">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L" {{ $rt->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $rt->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat', $rt->alamat) }}" required>
                        @error('alamat')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">No Telepon</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ old('no_telepon', $rt->no_telepon) }}" required>
                        @error('no_telepon')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Username</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username', $rt->username) }}" required>
                        @error('username')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Password</label>
                    <div class="col-11">
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $rt->password) }}" required>
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('rt') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
