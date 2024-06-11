@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Warga</h3>
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

            <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                    @if ($errors->has('nik'))
                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                    @if ($errors->has('nama_lengkap'))
                        <span class="text-danger">{{ $errors->first('nama_lengkap') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                    @if ($errors->has('tanggal_lahir'))
                        <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
                    @if ($errors->has('tempat_lahir'))
                        <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @if ($errors->has('jenis_kelamin'))
                        <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alamat_domisili">Alamat Domisili</label>
                    <textarea name="alamat_domisili" class="form-control" required>{{ old('alamat_domisili') }}</textarea>
                    @if ($errors->has('alamat_domisili'))
                        <span class="text-danger">{{ $errors->first('alamat_domisili') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" required>
                    @if ($errors->has('pekerjaan'))
                        <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select name="status_perkawinan" class="form-control" required>
                        <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                    @if ($errors->has('status_perkawinan'))
                        <span class="text-danger">{{ $errors->first('status_perkawinan') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
                    @if ($errors->has('no_telepon'))
                        <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bukti_ktp">Bukti KTP</label>
                    <input type="file" name="bukti_ktp" class="form-control" required>
                    @if ($errors->has('bukti_ktp'))
                        <span class="text-danger">{{ $errors->first('bukti_ktp') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" required>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Khonghucu" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                    </select>
                    @if ($errors->has('agama'))
                        <span class="text-danger">{{ $errors->first('agama') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
