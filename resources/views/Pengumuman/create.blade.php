@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pengumuman</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_pengumuman">Judul Pengumuman</label>
                    <input type="text" name="judul_pengumuman" id="judul_pengumuman" class="form-control" value="{{ old('judul_pengumuman') }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
                <div class="form-group">
                    <label for="id_rt">RT</label>
                    <select name="id_rt" id="id_rt" class="form-control" required>
                        @foreach($rts as $rt)
                            <option value="{{ $rt->id_rt }}" {{ old('id_rt') == $rt->id_rt ? 'selected' : '' }}>{{ $rt->no_rt }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pengumuman.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
