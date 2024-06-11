@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Daftar Keluarga</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('keluarga/create') }}">Tambah Keluarga</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- Filter --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_keluarga">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NKK</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.3/css/rowGroup.dataTables.min.css">
@endpush

@push('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table_keluarga').DataTable({
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('keluarga.list') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                columns: [
                    { data: 'id_keluarga', name: 'id_keluarga' },
                    { data: 'nomor_kk', name: 'nomor_kk' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'rt', name: 'rt' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false, render: function(data, type, row) {
                        return `
                            <a href="{{ url('keluarga/${row.id_keluarga}') }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ url('keluarga/${row.id_keluarga}/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ url('keluarga/${row.id_keluarga}') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                            </form>
                        `;
                    }},
                ],
                order: [[1, 'asc']],
            });

            // Add event listener for opening and closing details
            $('#table_keluarga tbody').on('click', 'tr', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            var wargaHtml = '<table class="table table-bordered table-striped table-hover table-sm">';
            if(d.warga.length > 0) {
                wargaHtml += '<thead><tr><th>NIK</th><th>Nama Lengkap</th><th>Tanggal Lahir</th><th>Jenis Kelamin</th><th>Aksi</th></tr></thead><tbody>';
                d.warga.forEach(function(warga) {
                    wargaHtml += `<tr>
                        <td>${warga.nik}</td>
                        <td>${warga.nama_lengkap}</td>
                        <td>${warga.tanggal_lahir}</td>
                        <td>${warga.jenis_kelamin}</td>
                        <td>
                            <a href="{{ url('keluarga/showWarga/${warga.id_warga}') }}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{ url('keluarga/${warga.id_warga}/editWarga') }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ url('warga/${warga.id_warga}') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>`;
                });
                wargaHtml += '</tbody>';
            } else {
                wargaHtml += '<tr><td colspan="5">Tidak ada data warga</td></tr>';
            }
            wargaHtml += '</table>';
            wargaHtml += `<a href="{{ url('keluarga/createWarga?keluarga_id=${d.id_keluarga}') }}" class="btn btn-sm btn-success mt-2">Tambah Anggota Keluarga</a>`;
            return wargaHtml;
        }
    </script>
@endpush
