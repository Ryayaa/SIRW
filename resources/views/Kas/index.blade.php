@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('kas.create') }}">Tambah Kas Baru</a>
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('kas.transaksi.create') }}">Transaksi Kas</a>
                <a class="btn btn-sm btn-secondary mt-1" href="{{ route('kas.history') }}">History Kas</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="saldo-box mb-3 p-3 bg-light rounded">
                <h4 class="text-center text-primary">Saldo Tersedia: <span class="font-weight-bold">Rp {{ number_format($saldo, 0, ',', '.') }}</span></h4>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kas">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jumlah Keluar</th>
                        <th>Jumlah Masuk</th>
                        <th>Tanggal</th>
                        <th>ID RT</th>
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
        var dataTable = $('#table_kas').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('kas.list') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            },
            columns: [
                { data: 'id_kas', name: 'id_kas' },
                { data: 'jumlah_keluar', name: 'jumlah_keluar' },
                { data: 'jumlah_masuk', name: 'jumlah_masuk' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'id_rt', name: 'id_rt' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
