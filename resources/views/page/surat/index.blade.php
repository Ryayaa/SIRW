<title>Pembuatan Surat Pengantar</title>
@extends('user-login.index')

@section('content')
<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Pembuatan Surat Pengantar</h4>
                        <i class="fas fa-envelope-open-text"></i>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('surat_pengantar-form.create') }}">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="id_jenis_surat" class="form-label">Kebutuhan Surat Surat</label>
                                <select id="id_jenis_surat" name="id_jenis_surat" class="form-select @error('id_jenis_surat') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Kebutuhan Surat</option>
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

                            <div class="form-group mb-4">
                                <label for="keterangan" class="form-label">Kebutuhan Surat Lain : </label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" disabled required>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <p>Catatan : </p>
                                <ul>
                                    <li>Surat akan otomatis terisi dengan data diri</li>
                                    <li>Surat akan otomatis terdownload ketika menekan "Buat Surat" </li>
                                <li>Silahkan mengubungi RT dan RW bersangkutan untuk meminta tanda tangan</li>
                                </ul>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> Buat Surat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
