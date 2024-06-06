@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Bantuan Sosial</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('bansos.update', $bansos->id_bansos) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_bansos">Nama Bantuan Sosial</label>
                    <input type="text" name="nama_bansos" class="form-control" value="{{ $bansos->nama_bansos }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ $bansos->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                    @if ($bansos->gambar)
                        <img src="{{ asset('storage/' . $bansos->gambar) }}" alt="{{ $bansos->nama_bansos }}" class="img-thumbnail mt-2" style="max-height: 200px;">
                    @endif
                </div>
                @foreach($bansos->kriteria as $i => $kriteria)
                    <div class="form-group">
                        <label for="kriteria_{{ $i }}">Nama Kriteria</label>
                        <input type="text" name="kriteria[{{ $kriteria->id_kriteria }}][nama]" class="form-control" value="{{ $kriteria->nama }}" required>
                        <label for="bobot_{{ $i }}">Bobot</label>
                        <input type="number" name="kriteria[{{ $kriteria->id_kriteria }}][bobot]" class="form-control" step="0.01" value="{{ $kriteria->bobot }}" required>
                        <label for="jenis_{{ $i }}">Jenis</label>
                        <select name="kriteria[{{ $kriteria->id_kriteria }}][jenis]" class="form-control" required>
                            <option value="Benefit" {{ $kriteria->jenis == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $kriteria->jenis == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                        <label for="subkriteria_{{ $i }}">Subkriteria</label>
                        <div class="subkriteria-group" id="subkriteria-group-{{ $i }}">
                            @foreach($kriteria->subkriteria as $j => $nilai)
                                <div class="subkriteria-item d-flex align-items-center mb-2">
                                    <input type="text" name="kriteria[{{ $kriteria->id_kriteria }}][subkriteria][]" class="form-control mr-2" placeholder="Nama Subkriteria" value="{{ $nilai->subkriteria }}" required>
                                    <input type="number" name="kriteria[{{ $kriteria->id_kriteria }}][nilai][]" class="form-control mr-2" placeholder="Nilai" value="{{ $nilai->nilai }}" step="0.01" required>
                                    <button type="button" class="btn btn-danger" onclick="removeSubkriteria(this)">Hapus</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addSubkriteria({{ $i }})">Tambah Subkriteria</button>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function addSubkriteria(index) {
            var group = document.getElementById('subkriteria-group-' + index);
            var newItem = document.createElement('div');
            newItem.className = 'subkriteria-item d-flex align-items-center mb-2';
            newItem.innerHTML = `
                <input type="text" name="kriteria[${index}][subkriteria][]" class="form-control mr-2" placeholder="Nama Subkriteria" required>
                <input type="number" name="kriteria[${index}][nilai][]" class="form-control mr-2" placeholder="Nilai" step="0.01" required>
                <button type="button" class="btn btn-danger" onclick="removeSubkriteria(this)">Hapus</button>
            `;
            group.appendChild(newItem);
        }

        function removeSubkriteria(button) {
            button.parentElement.remove();
        }
    </script>
@endsection
