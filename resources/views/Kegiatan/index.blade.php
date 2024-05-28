@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('kegiatan.create') }}">Tambah Kegiatan Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kegiatan">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kegiatan</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var dataTable = $('#table_kegiatan').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('kegiatan.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'id_kegiatan_warga', name: 'id_kegiatan_warga' },
                { data: 'nama_kegiatan', name: 'nama_kegiatan' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'lokasi', name: 'lokasi' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'waktu', name: 'waktu' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
