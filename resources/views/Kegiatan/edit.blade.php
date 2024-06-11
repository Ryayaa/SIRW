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
            <form method="POST" action="{{ route('kegiatan.store') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Kegiatan</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}" required>
                        @error('nama_kegiatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Deskripsi</label>
                    <div class="col-11">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Lokasi</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="lokasi" name="lokasi"
                            value="{{ old('lokasi') }}" required>
                        @error('lokasi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Waktu</label>
                    <div class="col-11">
                        <input type="time" class="form-control" id="waktu" name="waktu"
                            value="{{ old('waktu') }}" required>
                        @error('waktu')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">RT</label>
                    <div class="col-11">
                        <select name="id_rt" id="id_rt" class="form-control" required>
                            @foreach($rt as $rt)
                                <option value="{{ $rt->id_rt }}">{{ $rt->name }}</option>
                            @endforeach
                        </select>
                        @error('id_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Gambar</label>
                    <div class="col-11">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        @error('gambar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ route('kegiatan.index') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
