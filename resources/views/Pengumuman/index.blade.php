@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('pengumuman.create') }}">Tambah Pengumuman Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_pengumuman">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Pengumuman</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>ID RT</th>
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
        var baseUrl = "{{ url('images') }}/";

        var dataTable = $('#table_pengumuman').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('pengumuman.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'id_pengumuman', name: 'id_pengumuman' },
                { data: 'judul_pengumuman', name: 'judul_pengumuman' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'gambar', name: 'gambar', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="Pengumuman Image">` : 'No Image';
                }},
                { data: 'tanggal', name: 'tanggal' },
                { data: 'id_rt', name: 'id_rt' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
