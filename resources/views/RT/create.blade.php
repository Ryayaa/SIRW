@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Ketua RT Baru</h3>
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

            <form action="{{ route('rt.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="no_rt">Nomor RT</label>
                    <input type="text" name="no_rt" id="no_rt" class="form-control" value="{{ old('no_rt') }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('rw') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
