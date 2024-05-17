@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('warga-sementara.create') }}">Tambah Warga Sementara Baru</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_warga_sementara">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
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
        var dataTable = $('#table_warga_sementara').DataTable({
            serverSide: true,
            ajax: {
                url: "{{ route('warga-sementara.list') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                error: function(xhr, error, thrown) {
                    console.log(xhr.responseText);
                }
            },
            columns: [
                { data: 'id_warga_sementara', name: 'id_warga_sementara' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
