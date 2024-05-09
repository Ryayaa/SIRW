@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('rw/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- Ketua RW yang sedang menjabat --}}
            @php
                $ketua_rw = \App\Models\RwModel::where('status', 'Aktif')->first();
            @endphp
            @if ($ketua_rw)
                <div class="alert alert-info">Ketua RW yang sedang menjabat saat ini: {{ $ketua_rw->nama_lengkap }}</div>
            @else
                <div class="alert alert-warning">Tidak ada ketua RW yang sedang menjabat saat ini</div>
            @endif
            {{-- Filter --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_rw">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Status</th>
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
            var dataTable = $('#table_rw').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ route('rw.list') }}",
                    type: 'POST',
                },
                columns: [
                    { data: 'id_rw', name: 'id_rw' },
                    { data: 'nama_lengkap', name: 'nama_lengkap' },
                    { data: 'username', name: 'username' },
                    { data: 'status', name: 'status' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush
