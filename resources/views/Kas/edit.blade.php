@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kas</h3>
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

            <form method="POST" action="{{ route('kas.update', $kas->id_kas) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $kas->jumlah) }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_masuk">Jumlah Masuk</label>
                    <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control" value="{{ old('jumlah_masuk', $kas->jumlah_masuk) }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_keluar">Jumlah Keluar</label>
                    <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control" value="{{ old('jumlah_keluar', $kas->jumlah_keluar) }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan', $kas->keterangan) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $kas->tanggal) }}" required>
                </div>
                <div class="form-group">
                    <label for="id_rt">ID RT</label>
                    <select name="id_rt" id="id_rt" class="form-control" required>
                        <option value="">Pilih RT</option>
                        @foreach ($rt as $rtItem)
                            <option value="{{ $rtItem->id_rt }}" {{ $rtItem->id_rt == $kas->id_rt ? 'selected' : '' }}>{{ $rtItem->nama_rt }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kas.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
