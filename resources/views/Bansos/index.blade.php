@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('bansos.create') }}">Tambah Bansos Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_bansos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Bansos</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(document).ready(function() {
        // Set a base URL variable using Blade to output the base path
        var baseUrl = "{{ url('storage') }}/";

        var dataTable = $('#table_bansos').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('bansos.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'id_bansos', name: 'id_bansos' },
                { data: 'nama_bansos', name: 'nama_bansos' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'gambar', name: 'gambar', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="Bansos Image">` : 'No Image';
                }},
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush

