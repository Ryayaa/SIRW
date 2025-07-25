<title>Pengajuan Warga Sementara</title>
@extends('user-login.index')

@section('content')
<section class="container mt-5">
    <h1 class="text-center">Pengajuan Data Warga Sementara</h1>
    <p class="text-center text-muted">Lengkapi form di bawah ini untuk mengajukan data warga sementara</p>

    @if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('warga-sementara_form.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="bukti_ktp" class="form-label">Bukti KTP</label>
                <input type="file" name="bukti_ktp" class="form-control" id="bukti_ktp" required>
                @error('bukti_ktp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" value="{{ old('nik') }}" required>
                @error('nik')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat_asal" class="form-label">Alamat Asal</label>
                <textarea name="alamat_asal" class="form-control" id="alamat_asal" rows="3" required>{{ old('alamat_asal') }}</textarea>
                @error('alamat_asal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                <textarea name="alamat_domisili" class="form-control" id="alamat_domisili" rows="3" required>{{ old('alamat_domisili') }}</textarea>
                @error('alamat_domisili')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                @error('pekerjaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                <select name="status_perkawinan" class="form-control" id="status_perkawinan" required>
                    <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                    <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                    <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                </select>
                @error('status_perkawinan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <select name="agama" class="form-control" required>
                        <option value="islam">Islam</option>
                        <option value="protestan">Protestan</option>
                        <option value="katolik">Katolik</option>
                        <option value="budha">Budha</option>
                        <option value="hindu">Hindu</option>
                        <option value="khonghucu">Khonghucu</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
        @endsection
