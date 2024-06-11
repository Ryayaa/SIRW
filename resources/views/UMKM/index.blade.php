@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('umkm.create') }}">Tambah UMKM Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_umkm">
                <thead>
                    <tr>
                        <th>ID UMKM</th>
                        <th>Nama UMKM</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Gambar</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
<style>
    .status-box {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .status-pending {
        background-color: yellow;
    }
    .status-disetujui {
        background-color: green;
        color: white;
    }
    .status-ditolak {
        background-color: red;
        color: white;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        // Set a base URL variable using Blade to output the base path
        var baseUrl = "{{ url('images') }}/";

        var dataTable = $('#table_umkm').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('umkm.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'id_umkm', name: 'id_umkm' },
                { data: 'nama_umkm', name: 'nama_umkm' },
                { data: 'alamat', name: 'alamat' },
                { data: 'no_telepon', name: 'no_telepon' },
                { data: 'gambar', name: 'gambar', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="UMKM Image">` : 'No Image';
                }},
                { data: 'status_pengajuan', name: 'status_pengajuan', render: function(data, type, full, meta) {
                    var statusClass = '';
                    var statusText = '';

                    if(data === 1) {
                        statusClass = 'status-disetujui';
                        statusText = 'Disetujui';
                    } else if(data === 0) {
                        statusClass = 'status-ditolak';
                        statusText = 'Ditolak';
                    } else {
                        statusClass = 'status-pending';
                        statusText = 'Pending';
                    }

                    return `<div class="status-box ${statusClass}">${statusText}</div>`;
                }},
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
