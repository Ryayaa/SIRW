@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('rt/create') }}">Tambah</a>
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
            <table class="table table-bordered table-striped table-hover table-sm" id="table_rt">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nomor RT</th>
                        <th>Nama Lengkap</th>
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
            var dataTable = $('#table_rt').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ route('rt.list') }}",
                    type: 'POST',
                },
                columns: [
                    { data: 'id_rt', name: 'id_rt' },
                    { data: 'no_rt', name: 'no_rt' },
                    { data: 'nama_lengkap', name: 'nama_lengkap' },
                    { data: 'status', name: 'status' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush
