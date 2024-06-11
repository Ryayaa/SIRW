@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
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

            <form method="POST" action="{{ url('/umkm/' . $umkm->id_umkm) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama UMKM</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_umkm" name="nama_umkm"
                            value="{{ old('nama_umkm', $umkm->nama_umkm) }}" required>
                        @error('nama_umkm')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ old('alamat', $umkm->alamat) }}" required>
                        @error('alamat')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Deskripsi</label>
                    <div class="col-11">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">No Telepon</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            value="{{ old('no_telepon', $umkm->no_telepon) }}" required>
                        @error('no_telepon')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Gambar</label>
                    <div class="col-11">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        @if ($umkm->gambar)
                            <img src="{{ asset('images/' . $umkm->gambar) }}" alt="{{ $umkm->nama_umkm }}" class="img-thumbnail mt-2" style="max-height: 200px;">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                        @error('gambar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">ID Warga</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="id_warga" name="id_warga"
                            value="{{ old('id_warga', $umkm->id_warga) }}" required>
                        @error('id_warga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Status Pengajuan</label>
                    <div class="col-11">
                        <select name="status_pengajuan" class="form-control">
                            <option value="1" {{ old('status_pengajuan', $umkm->status_pengajuan) == 1 ? 'selected' : '' }}>Disetujui</option>
                            <option value="0" {{ old('status_pengajuan', $umkm->status_pengajuan) == 0 ? 'selected' : '' }}>Ditolak</option>
                            <option value="2" {{ old('status_pengajuan', $umkm->status_pengajuan) == 2 ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('umkm') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
