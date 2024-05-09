@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Warga</h3>
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

            <form action="{{ route('warga.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="NIK">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" name="NIK" id="NIK" class="form-control" value="{{ old('NIK') }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                </div>                
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Domisili</label>
                    <input type="text" name="alamat_domisili" id="alamat_domisili" class="form-control" value="{{ old('alamat_domisili') }}" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" required>
                </div>
                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                        <option value="Kawin">Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control" required>
                        <option value="RT">RT</option>
                        <option value="RW">RW</option>
                        <option value="Warga">Warga</option>
                        <option value="Warga Sementara">Warga Sementara</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Keluarga</label>
                    <div class="col-11">
                        <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                            <option value="">- Pilih Keluarga -</option>
                            @foreach($keluarga as $item)
                                <option value="{{ $item->id_keluarga }}">{{ $item->nomor_kk }}</option>
                            @endforeach
                            </select>
                        @error('id_keluarga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('warga') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection
