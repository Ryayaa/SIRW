@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buat Surat Pengantar</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('surat_pengantar-form.create') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="id_jenis_surat">Jenis Surat</label>
                            <select id="id_jenis_surat" name="id_jenis_surat" class="form-control @error('id_jenis_surat') is-invalid @enderror" required>
                                @foreach($jenis_surat_pengantar as $jenis_surat)
                                    <option value="{{ $jenis_surat->id_jenis_surat }}">{{ $jenis_surat->nama_jenis }}</option>
                                @endforeach
                            </select>
                            @error('id_jenis_surat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" disabled required>
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section></section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jenisSuratDropdown = document.getElementById('id_jenis_surat');
    const keteranganInput = document.getElementById('keterangan');

    jenisSuratDropdown.addEventListener('change', function() {
        const selectedOption = jenisSuratDropdown.options[jenisSuratDropdown.selectedIndex].text;
        if (selectedOption === 'Lain-lain') {
            keteranganInput.disabled = false;
        } else {
            keteranganInput.disabled = true;
            keteranganInput.value = '';
        }
    });
});
</script>
@endsection
