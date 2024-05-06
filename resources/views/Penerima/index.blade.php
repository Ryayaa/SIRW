@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('penerima/create') }}">Tambah</a>
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
            <table class="table table-bordered table-striped table-hover table-sm" id="table_penerima">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Warga</th>
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
            var dataTable = $('#table_penerima').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ route('penerima.list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d){
                        d.id_warga = $('#id_warga').val();
                    }
                },
                columns: [
                    { data: 'id_penerima_bansos', name: 'id_penerima_bansos' },
                    { data: 'id_warga', name: 'id_warga' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ]
            });
        });
        $('#id_warga').on('change', function() {
                dataTable.ajax.reload();
            });
    </script>
@endpush
