@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('keluarga/create') }}">Tambah</a>
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
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataTable = $('#table_keluarga').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ route('keluarga.list') }}",
                    type: 'POST',
                },
                columns: [
                    { data: 'id_keluarga', name: 'id_keluarga' },
                    { data: 'nomor_kk', name: 'nomor_kk' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'rt.no_rt', name: 'rt.no_rt' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endpush
