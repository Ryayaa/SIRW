@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kegiatan</h3>
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

            <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id_kegiatan_warga) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $kegiatan->lokasi) }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $kegiatan->tanggal) }}" required>
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" name="waktu" id="waktu" class="form-control" value="{{ old('waktu', $kegiatan->waktu) }}" required>
                </div>
                <div class="form-group">
                    <label for="id_rt">ID RT</label>
                    <select name="id_rt" id="id_rt" class="form-control" required>
                        <option value="">Pilih RT</option>
                        @foreach ($rt as $rtItem)
                            <option value="{{ $rtItem->id_rt }}" {{ $rtItem->id_rt == $kegiatan->id_rt ? 'selected' : '' }}>{{ $rtItem->nama_rt }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
