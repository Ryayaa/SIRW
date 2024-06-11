@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ url('/rt/' . $rt->id_rt) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nomor RT</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="no_rt" name="no_rt"
                            value="{{ old('no_rt', $rt->no_rt) }}" required>
                        @error('no_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label" for="id_warga">Pilih Ketua</label>
                    <div class="col-11">
                        <select name="id_warga" id="id_warga" class="form-control" required>
                            @foreach ($wargas as $warga)
                                <option value="{{ $warga->id_warga }}">{{ $warga->nama_lengkap }} {{$warga->keluarga->rt->no_rt}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('rt') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
