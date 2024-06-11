@extends('user-login.index')
@section('content')
<section class="container mt-5">
    <h1>Detail Warga Sementara</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Detail Warga Sementara
        </div>
        <div class="card-body">
            <p><strong>NIK:</strong> {{ $warga->nik }}</p>
            <p><strong>Nama Lengkap:</strong> {{ $warga->nama_lengkap }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $warga->tempat_lahir }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $warga->tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
            <p><strong>Alamat Asal:</strong> {{ $warga->alamat_asal }}</p>
            <p><strong>Alamat Domisili:</strong> {{ $warga->alamat_domisili }}</p>
            <p><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
            <p><strong>Status Perkawinan:</strong> {{ $warga->status_perkawinan }}</p>
            <p><strong>Status Hubungan:</strong> {{ $warga->status_hubungan }}</p>
            <p><strong>No Telepon:</strong> {{ $warga->no_telepon }}</p>
            <p><strong>Agama:</strong> {{ $warga->agama }}</p>
            <p><strong>Bukti KTP:</strong></p>
            <img src="{{ asset('uploads/bukti_ktp/' . $warga->bukti_ktp) }}" alt="Bukti KTP" class="img-fluid">
        </div>
    </div>
</section>
@endsection
