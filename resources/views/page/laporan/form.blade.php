<title>Form Laporan Masalah</title>
@extends('user-login.index')

@section('content')
<section class="container mt-5">
    <h1 class="text-center">Buat Laporan Masalah</h1>
    <p class="text-center text-muted">Lengkapi form di bawah ini untuk membuat laporan masalah baru</p>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('laporan_masalah_form.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul_laporan" class="form-label">Judul Laporan</label>
                <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" placeholder="Masukkan Judul Laporan" value="{{ old('judul_laporan') }}" required>
                @error('judul_laporan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Laporan" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
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

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="status_hide" name="status_hide" value="t" {{ old('status_hide') == 't' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_hide">Tampilkan Nama</label>
                @error('status_hide')
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

