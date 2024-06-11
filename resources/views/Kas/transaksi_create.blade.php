@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Transaksi Kas</h3>
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

            <form action="{{ route('kas.transaksi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jumlah">Jumlah Keluar</label>
                    <input type="number" name="jumlah_keluar" id="jumlah_keluar" class="form-control" value="{{ old('jumlah') }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
                <div class="form-group">
                    <label for="id_rt">No RT</label>
                    <select name="id_rt" id="id_rt" class="form-control" required>
                        <option value="">Pilih RT</option>
                        @foreach ($rt as $rtItem)
                            <option value="{{ $rtItem->id_rt }}">{{ $rtItem->no_rt }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kas.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
