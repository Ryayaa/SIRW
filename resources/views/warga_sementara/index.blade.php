@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ route('warga_sementara.create') }}">Tambah Warga Sementara Baru</a>
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
                        <th>NIK</th>
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
        // Set a base URL variable using Blade to output the base path
        var baseUrl = "{{ url('images') }}/";

        var dataTable = $('#table_warga_sementara').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('warga_sementara.list') }}",
                type: 'POST',
            },
            columns: [
                { data: 'id_warga_sementara', name: 'id_warga_sementara' },
                { data: 'nik', name: 'nik' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'alamat_asal', name: 'alamat_asal' },
                { data: 'alamat_domisili', name: 'alamat_domisili' },
                { data: 'pekerjaan', name: 'pekerjaan' },
                { data: 'status_perkawinan', name: 'status_perkawinan' },
                { data: 'tanggal_masuk', name: 'tanggal_masuk' },
                { data: 'bukti_ktp', name: 'bukti_ktp', render: function(data, type, full, meta) {
                    return data ? `<img src="` + baseUrl + data + `" width="50" height="50" alt="Bukti KTP">` : 'No Image';
                }},
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
