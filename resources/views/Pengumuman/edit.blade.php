@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ url('/pengumuman/' . $pengumuman->id_pengumuman) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}
                
                <div class="form-group row">
                    <label for="judul_pengumuman" class="col-sm-2 col-form-label">Judul Pengumuman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman"
                            value="{{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}" required>
                        @error('judul_pengumuman')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        @error('gambar')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $pengumuman->tanggal) }}" required>
                        @error('tanggal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_rt" class="col-sm-2 col-form-label">RT</label>
                    <div class="col-sm-10">
                        <select name="id_rt" id="id_rt" class="form-control" required>
                            @foreach($rts as $rt)
                                <option value="{{ $rt->id_rt }}" {{ old('id_rt', $pengumuman->id_rt) == $rt->id_rt ? 'selected' : '' }}>{{ $rt->no_rt }}</option>
                            @endforeach
                        </select>
                        @error('id_rt')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('pengumuman') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .form-horizontal .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            border-radius: .25rem;
        }
        .form-control-file {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-default {
            background-color: #f8f9fa;
            border-color: #dae0e5;
        }
    </style>
@endpush

@push('js')
@endpush
