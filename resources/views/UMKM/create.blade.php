@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data UMKM</h3>
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

            <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_umkm">Nama UMKM</label>
                    <input type="text" name="nama_umkm" id="nama_umkm" class="form-control" value="{{ old('nama_umkm') }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="id_warga">Warga</label>
                    <select name="id_warga" id="id_warga" class="form-control" required>
                        @foreach($wargas as $warga)
                            <option value="{{ $warga->id_warga }}" {{ old('id_warga') == $warga->id_warga ? 'selected' : '' }}>{{ $warga->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="status_umkm">Status UMKM</label>
                            <select name="status_umkm" class="form-control">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('umkm.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
