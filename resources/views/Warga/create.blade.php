@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Warga</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('warga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Keluarga</label>
                    <div class="col-11">
                        <select class="form-control" id="id_keluarga" name="id_keluarga" required>
                            <option value="">- Pilih Keluarga -</option>
                            @foreach($keluarga as $item)
                                <option value="{{ $item->id_keluarga }}">{{ $item->nomor_kk }}</option>
                            @endforeach
                            </select>
                        @error('id_keluarga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat_domisili">Alamat Domisili</label>
                    <textarea name="alamat_domisili" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="status_perkawinan">Status Perkawinan</label>
                    <select name="status_perkawinan" class="form-control" required>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status_hubungan">Status Hubungan</label>
                    <select name="status_hubungan" class="form-control" required>
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                        <option value="Menantu">Menantu</option>
                        <option value="Cucu">Cucu</option>
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Mertua">Mertua</option>
                        <option value="Famili Lain">Famili Lain</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bukti_ktp">Bukti KTP</label>
                    <input type="file" name="bukti_ktp" class="form-control" required>
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
