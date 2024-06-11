@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_laporan">
                <thead>
                    <tr>
                        <th>Laporan</th>
                        <th>Tanggal Laporan</th>
                        <th>Tanggal</th>
                        <th>Pelapor</th>
                        {{-- <th>Konfirmasi</th> --}}
                        <th>Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var dataTable = $('#table_laporan').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('laporan-acc.list') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            },
            columns: [
                { data: 'judul_laporan', name: 'judul_laporan' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'tanggal_laporan', name: 'tanggal_laporan' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                // { data: 'konfirmasi', name: 'konfirmasi', orderable: false, searchable: false },
                { data: 'detail', name: 'detail' },
            ]
        });
    });
</script>
@endpush
