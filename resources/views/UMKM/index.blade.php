@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">

            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Tabs for switching between UMKM statuses -->
            <ul class="nav nav-tabs" id="umkmTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">UMKM Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">UMKM Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">UMKM Ditolak</a>
                </li>
            </ul>
            <div class="tab-content" id="umkmTabContent">
                <!-- Pending Tab Pane -->
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_umkm_pending">
                            <thead>
                                <tr>
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
                <!-- Approved Tab Pane -->
                <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_umkm_approved">
                            <thead>
                                <tr>
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
                <!-- Rejected Tab Pane -->
                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-sm w-100" id="table_umkm_rejected">
                            <thead>
                                <tr>
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
            </div>
        </div>
    </div>
@endsection


@push('css')
<style>
    .status-box {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.85em;
        margin: auto;
    }
    .status-pending {
        background-color: yellow;
        color: black;
    }
    .status-disetujui {
        background-color: green;
        color: white;
    }
    .status-ditolak {
        background-color: red;
        color: white;
    }
    .table img {
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
    .table-actions {
        display: flex;
        justify-content: center;
    }
    .table-actions a {
        margin: 0 5px;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        var baseUrl = "{{ url('images') }}/";

        var pendingTable = $('#table_umkm_pending').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('umkm.list') }}",
                type: 'POST',
                data: function(d) {
                    d.status_pengajuan = 'null';
                }
            },
            columns: [
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
                { data: 'id_umkm', name: 'aksi', orderable: false, searchable: false, render: function(data, type, full, meta) {
                    return `
                        <div class="table-actions">
                            <a href="{{ url('umkm/${data}/edit') }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Detail
                            </a>
                        </div>
                    `;
                }},
            ]
        });

        var approvedTable = $('#table_umkm_approved').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('umkm.list') }}",
                type: 'POST',
                data: function(d) {
                    d.status_pengajuan = 1;
                }
            },
            columns: [
                { data: 'nama_umkm', name: 'nama_umkm' },
                { data: 'alamat', name: 'alamat' },
                { data: 'no_telepon', name: 'no_telepon' },
                { data: 'gambar', name: 'gambar', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="UMKM Image">` : 'No Image';
                }},
                { data: 'status_pengajuan', name: 'status_pengajuan', render: function(data, type, full, meta) {
                    var statusClass = 'status-disetujui';
                    var statusText = 'Disetujui';

                    return `<div class="status-box ${statusClass}">${statusText}</div>`;
                }},
                { data: 'id_umkm', name: 'aksi', orderable: false, searchable: false, render: function(data, type, full, meta) {
                    return `
                        <div class="table-actions">
                            <a href="{{ url('/umkm/${data}/edit') }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Detail
                            </a>
                        </div>
                    `;
                }},
            ]
        });

        var rejectedTable = $('#table_umkm_rejected').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('umkm.list') }}",
                type: 'POST',
                data: function(d) {
                    d.status_pengajuan = 0;
                }
            },
            columns: [

                { data: 'nama_umkm', name: 'nama_umkm' },
                { data: 'alamat', name: 'alamat' },
                { data: 'no_telepon', name: 'no_telepon' },
                { data: 'gambar', name: 'gambar', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="UMKM Image">` : 'No Image';
                }},
                { data: 'status_pengajuan', name: 'status_pengajuan', render: function(data, type, full, meta) {
                    var statusClass = 'status-ditolak';
                    var statusText = 'Ditolak';

                    return `<div class="status-box ${statusClass}">${statusText}</div>`;
                }},
                { data: 'id_umkm', name: 'aksi', orderable: false, searchable: false, render: function(data, type, full, meta) {
                    return `
                        <div class="table-actions">
                            <a href="{{ url('umkm/${data}/edit') }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Detail
                            </a>
                        </div>
                    `;
                }},
            ]
        });
    });
</script>
@endpush
