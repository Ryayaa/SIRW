{{-- resources/views/keluarga/edit.blade.php --}}

@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Keluarga</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('keluarga.update', $keluarga->id_keluarga) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nomor_kk">Nomor KK</label>
                    <input type="text" name="nomor_kk" class="form-control" value="{{ $keluarga->nomor_kk }}" required>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $keluarga->alamat }}" required>
                </div>
                
                <div class="form-group">
                    <label for="id_rt">RT</label>
                    <input type="number" name="id_rt" class="form-control" value="{{ $keluarga->id_rt }}" required>
                </div>

                <div class="form-group">
                    <label for="bukti_kk">Gambar Bukti KK</label>
                    <input type="file" name="bukti_kk" class="form-control">
                    @if ($keluarga->bukti_kk)
                        <img src="{{ asset('images/warga/kk/' . $keluarga->bukti_kk) }}" alt="Bukti KK" width="200" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('keluarga.index') }}" class="btn btn-default">Batal</a>
            </form>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
