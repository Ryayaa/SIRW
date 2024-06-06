@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Pengajuan Bantuan Sosial</h3>
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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('penerima.save') }}" method="POST">
                @csrf
                <input type="hidden" name="id_bansos" value="{{ $idBansos }}">
                <div class="form-group">
                    <label for="id_warga">Nama Warga</label>
                    <select name="id_warga" class="form-control" required>
                        <option value="">Pilih Nama Warga</option>
                        @foreach($wargaList as $warga)
                            <option value="{{ $warga->id_warga }}">{{ $warga->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($kriteria as $k)
                <div class="form-group">
                    <label for="id_kriteria_{{ $k->id_kriteria }}">{{ $k->nama }}</label>
                    <select name="id_kriteria[{{ $k->id_kriteria }}]" class="form-control" required>
                        <option value="">Pilih {{ $k->nama }}</option>
                        @foreach($k->subkriteria as $s)
                            <option value="{{ $s->id_nilai }}">{{ $s->subkriteria }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach                
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            <a class="btn btn btn-default" href="{{ url('penerima/' . $idBansos . '/pengajuan/') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection
