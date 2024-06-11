@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Keluarga</h3>
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

            <form action="{{ route('keluarga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nomor_kk">Nomor Kartu Keluarga (NKK)</label>
                    <input type="text" name="nomor_kk" id="nomor_kk" class="form-control" value="{{ old('nomor_kk') }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">RT</label>
                    <div class="col-11">
                        <select class="form-control" id="id_rt" name="id_rt" required>
                            <option value="">- Pilih Nomor RT -</option>
                            @foreach($rt as $item)
                                <option value="{{ $item->id_rt }}">{{ $item->no_rt }}</option>
                            @endforeach
                            </select>
                        @error('id_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="bukti_kk">Bukti KK</label>
                    <input type="file" name="bukti_kk" class="form-control" id="bukti_kk">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('keluarga') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
