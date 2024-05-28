@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Daftar Laporan Masalah</h1>
    </div>


    <div class="list-group d-flex flex-column align-items-center" id="laporanList">
        @foreach($laporans as $laporan)
        <a href="{{ route('laporanMasalah.detail', $laporan->id_laporan_masalah) }}" class="list-group-item list-group-item-action w-75 mb-2">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1">{{ $laporan->judul_laporan }}</h5>
                <small class="text-muted"><i class="bi bi-calendar"></i> {{ $laporan->tanggal_laporan }}</small>
            </div>
            <p class="mb-1">{{ $laporan->deskripsi }}</p>
            @if($laporan->status_hide == 't')
            <small class="text-muted">Dilaporkan oleh: {{ $laporan->warga->nama_lengkap }}</small>
            @else
            <small class="text-muted">Dilaporkan oleh: <em>Anonymous</em></small>
            @endif
        </a>
        @endforeach
    </div>


        <div class="text-center mb-4">
            <a href="{{ route('laporan_masalah_form.show') }}" class="btn btn-primary">
                Buat Laporan Baru
            </a>
        </div>
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center" id="paginationLaporan">
            {{-- Link Previous --}}
            @if($page > 1)
            <li class="page-item">
                <a class="page-link" href="{{ url()->current() }}?page={{ $page - 1 }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">&laquo;</span>
            </li>
            @endif

            {{-- Link Number --}}
            @for($i = 1; $i <= $totalPages; $i++)
            <li class="page-item {{ $page == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor

            {{-- Link Next --}}
            @if($page < $totalPages)
            <li class="page-item">
                <a class="page-link" href="{{ url()->current() }}?page={{ $page + 1 }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">&raquo;</span>
            </li>
            @endif
        </ul>
    </nav>
</div>

<section></section>
@endsection
