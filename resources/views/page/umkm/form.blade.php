@extends('user-login.index')

@section('content')
<section class="container mt-5">
    <h1 class="text-center">Pengajuan UMKM Baru</h1>
    <p class="text-center text-muted">Lengkapi form di bawah ini untuk mendaftarkan UMKM baru</p>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('umkm_form.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_umkm" class="form-label">Nama UMKM</label>
                <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" placeholder="Masukkan Nama UMKM" value="{{ old('nama_umkm') }}" required>
                @error('nama_umkm')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" placeholder="Masukkan Alamat UMKM" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan Nomor Telepon" value="{{ old('no_telepon') }}" required>
                @error('no_telepon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection
