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
            <form method="POST" action="{{ url('/warga/' . $warga->id_warga) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nomor Kartu Keluarga (NKK)</label>
                    <div class="col-11">
                        <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                            <option value="">- Pilih Keluarga -</option>
                            @foreach($keluarga as $item)
                                <option value="{{ $item->id_keluarga }}" @if($item->id_keluarga == $warga->id_keluarga) selected @endif>{{ $item->nomor_kk }}</option>
                            @endforeach
                        </select>
                        @error('id_keluarga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nomor Induk Kependudukan (NIK)</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="NIK" name="NIK"
                            value="{{ old('NIK', $warga->nik) }}" required>
                        @error('NIK')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Lengkap</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required>
                        @error('nama_lengkap')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Lahir</label>
                    <div class="col-11">
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                        @error('tanggal_lahir')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jenis Kelamin</label>
                    <div class="col-11">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-Laki" {{ $warga->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Alamat Domisili</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="alamat_domisili" name="alamat_domisili"
                            value="{{ old('alamat_domisili', $warga->alamat_domisili) }}" required>
                        @error('alamat_domisili')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Pekerjaan</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                        @error('pekerjaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Status Perkawinan</label>
                    <div class="col-11">
                        <select class="form-control" id="status_perkawinan" name="status_perkawinan" required>
                            <option value="Kawin" {{ $warga->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Belum Kawin" {{ $warga->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Level</label>
                    <div class="col-11">
                        <select class="form-control" id="level" name="level" required>
                            <option value="RT" {{ $warga->level == 'RT' ? 'selected' : '' }}>RT</option>
                            <option value="RW" {{ $warga->level == 'RW' ? 'selected' : '' }}>RW</option>
                            <option value="Warga" {{ $warga->level == 'Warga' ? 'selected' : '' }}>Warga</option>
                            <option value="Warga Sementara" {{ $warga->level == 'Warga Sementara' ? 'selected' : '' }}>Warga Sementara</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Password</label>
                    <div class="col-11">
                        <input type="password" class="form-control" id="password" name="password"
                            value="{{ old('password', $warga->password) }}" required>
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- Add other fields as per your warga table structure -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('warga') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
