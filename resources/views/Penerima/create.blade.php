@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Penerima Bansos</h3>
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

            <form action="{{ route('penerima.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Warga</label>
                    <div class="col-11">
                        <select class="form-control" id="id_warga" name="id_warga" required>
                            <option value="">- Pilih Warga -</option>
                            @foreach($warga as $item)
                                <option value="{{ $item->id_warga }}">{{ $item->nama_lengkap }}</option>
                            @endforeach
                            </select>
                        @error('id_warga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('penerima') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
