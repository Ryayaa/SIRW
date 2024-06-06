@extends('user-login.index')

@section('content')
    <section>
        <div class="container mt-5">
            <h1>Formulir Data Tamu </h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('tamu_form.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                        value="{{ old('nama_lengkap') }}" required>
                    @error('nama_lengkap')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                        value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                    <textarea name="alamat_ktp" class="form-control" id="alamat_ktp" rows="3" required>{{ old('alamat_ktp') }}</textarea>
                    @error('alamat_ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat_menetap" class="form-label">Alamat Menetap</label>
                    <textarea name="alamat_menetap" class="form-control" id="alamat_menetap" rows="3" required>{{ old('alamat_menetap') }}</textarea>
                    @error('alamat_menetap')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No. Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                        value="{{ old('no_telepon') }}" required>
                    @error('no_telepon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk"
                        value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar"
                        value="{{ old('tanggal_keluar') }}" required>
                    @error('tanggal_keluar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bukti_ktp" class="form-label">Bukti KTP</label>
                    <input type="file" name="bukti_ktp" class="form-control" id="bukti_ktp" required>
                    @error('bukti_ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection
