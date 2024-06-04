@extends('user-login.index')
@section('content')
<section class="container mt-5">
    <h1>Pengajuan Bantuan Sosial</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_warga" value="{{ Auth::user()->id_warga }}">
        <input type="hidden" name="id_bansos" value="{{ $idBansos }}">
        @foreach ($kriteria as $k)
                <div class="form-group">
                    <label for="id_kriteria_{{ $k->id_kriteria }}">{{ $k->nama }}</label>
                    <select name="id_kriteria[{{ $k->id_kriteria }}]" class="form-control" required>
                        <option value="">Pilih {{ $k->nama }}</option>
                        @foreach($k->subkriteria as $s)
                            <option value="{{ $s->id_nilai }}">{{ $s->subkriteria }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
        @endforeach
        <a href="/pengajuan-list" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</section>
@endsection
