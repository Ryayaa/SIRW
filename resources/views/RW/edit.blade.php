@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('rw.update', ['id' => $rw->id_rw]) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_rw" value="{{ $rw ? $rw->id_rw : '' }}">

            <div class="form-group row">
                <label class="col-2 control-label col-form-label" for="id_warga">Pilih Ketua RW Baru</label>
                <div class="col-10">
                    <select name="id_warga" id="id_warga" class="form-control" required>
                        @foreach ($wargas as $warga)
                            <option value="{{ $warga->id_warga }}">{{ $warga->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
