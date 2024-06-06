@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kas</h3>
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

            <form action="{{ route('kas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_masuk">Jumlah Masuk</label>
                    <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control" value="{{ old('jumlah_masuk') }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ old('keterangan') }}">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
                <div class="form-group">
                    <label for="id_rt">ID RT</label>
                    <select name="id_rt" id="id_rt" class="form-control" required>
                        <option value="">Pilih RT</option>
                        @foreach ($rt as $rtItem)
                            <option value="{{ $rtItem->id_rt }}">{{ $rtItem->nama_rt }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kas.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
