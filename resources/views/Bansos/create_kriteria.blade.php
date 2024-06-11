@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Kriteria Bantuan Sosial</h3>
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
            <form id="kriteriaForm" action="{{ route('bansos.storeKriteria') }}" method="POST">
                @csrf
                <input type="hidden" name="id_bansos" value="{{ $id_bansos }}">
                @for ($i = 0; $i < $jumlah_kriteria; $i++)
                    <div class="form-group">
                        <label for="kriteria_{{ $i }}">Nama Kriteria</label>
                        <input type="text" name="kriteria[{{ $i }}][nama]" class="form-control" required>
                        <label for="bobot_{{ $i }}">Bobot</label>
                        <input type="number" name="kriteria[{{ $i }}][bobot]" class="form-control bobot-input" step="0.01" required>
                        <label for="jenis_{{ $i }}">Jenis</label>
                        <select name="kriteria[{{ $i }}][jenis]" class="form-control" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>

                        <label for="subkriteria_{{ $i }}">Subkriteria</label>
                        <div class="subkriteria-group" id="subkriteria-group-{{ $i }}">
                            <div class="subkriteria-item d-flex align-items-center mb-2">
                                <input type="text" name="kriteria[{{ $i }}][subkriteria][]" class="form-control mr-2" placeholder="Nama Subkriteria" required>
                                <input type="number" name="kriteria[{{ $i }}][nilai][]" class="form-control mr-2" placeholder="Nilai" step="0.01" required>
                                <button type="button" class="btn btn-danger" onclick="removeSubkriteria(this)">Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addSubkriteria({{ $i }})">Tambah Subkriteria</button>
                    </div>
                @endfor
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('kriteriaForm').addEventListener('submit', function(event) {
            var totalBobot = 0;
            document.querySelectorAll('.bobot-input').forEach(function(input) {
                totalBobot += parseFloat(input.value);
            });
            if (totalBobot !== 100) {
                alert('Total bobot harus 100.');
                event.preventDefault();
            }
        });

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
