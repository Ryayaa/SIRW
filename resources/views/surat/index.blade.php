@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('surat.create') }}">Tambah Surat Pengantar Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_surat">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Warga</th>
                        <th>Jenis Surat</th>
                        <th>Keterangan</th>
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
        var dataTable = $('#table_surat').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('surat.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'tanggal', name: 'tanggal' },
                { data: 'nama_warga', name: 'nama_warga' },
                { data: 'nama_jenis', name: 'nama_jenis' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
