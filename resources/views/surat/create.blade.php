@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Surat Pengantar</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('surat.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_warga">Nama Warga</label>
                    <select name="id_warga" id="id_warga" class="form-control" required>
                        <option value="">Pilih Warga</option>
                        @foreach ($warga as $wargaItem)
                            <option value="{{ $wargaItem->id_warga }}">{{ $wargaItem->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                @error('id_warga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="form-group">
                    <label for="id_jenis_surat">Jenis Surat</label>
                    <select name="id_jenis_surat" id="id_jenis_surat" class="form-control" required>
                        <option value="">Pilih Jenis Surat</option>
                        @foreach ($jenisSurat as $jenisSuratItem)
                            <option value="{{ $jenisSuratItem->id_jenis_surat }}">{{ $jenisSuratItem->nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>
                @error('id_jenis_surat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" disabled>{{ old('keterangan') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('surat.index') }}" class="btn btn-default">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisSuratSelect = document.getElementById('id_jenis_surat');
            const keteranganTextarea = document.getElementById('keterangan');

            function toggleKeterangan() {
                if (jenisSuratSelect.options[jenisSuratSelect.selectedIndex].text === 'Lain - Lain') {
                    keteranganTextarea.removeAttribute('disabled');
                } else {
                    keteranganTextarea.setAttribute('disabled', 'disabled');
                }
            }

            jenisSuratSelect.addEventListener('change', toggleKeterangan);

            // Initial check on page load
            toggleKeterangan();
        });
    </script>
@endpush
