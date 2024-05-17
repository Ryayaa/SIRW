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
            <form method="POST" action="{{ url('/pengumuman/' . $pengumuman->id_pengumuman) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Judul Pengumuman</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman"
                            value="{{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}" required>
                        @error('judul_pengumuman')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Deskripsi</label>
                    <div class="col-11">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                        @error('deskripsi')
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
                    <label class="col-1 control-label col-form-label">Tanggal</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $pengumuman->tanggal) }}" required>
                        @error('tanggal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">RT</label>
                    <div class="col-11">
                        <select name="id_rt" id="id_rt" class="form-control" required>
                            @foreach($rts as $rt)
                                <option value="{{ $rt->id_rt }}" {{ old('id_rt', $pengumuman->id_rt) == $rt->id_rt ? 'selected' : '' }}>{{ $rt->name }}</option>
                            @endforeach
                        </select>
                        @error('id_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('pengumuman') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
