@extends('user-login.index')

@section('content')
<section class="container mt-5">
    <h1>Buat Laporan Masalah</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('laporan_masalah_form.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul_laporan" class="form-label">Judul Laporan</label>
            <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" value="{{ old('judul_laporan') }}" required>
            @error('judul_laporan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
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


        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</section>
@endsection
