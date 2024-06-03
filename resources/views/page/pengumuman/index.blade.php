@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Daftar Pengumuman</h1>
    </div>
    <div class="list-group d-flex flex-column align-items-center" id="announcementList">
        @foreach($pengumumans as $pengumuman)
        <a href="{{ route('pengumuman.detail', $pengumuman->id_pengumuman) }}" class="list-group-item list-group-item-action w-75 mb-2">
            <div class="d-flex justify-content-between">
                <h5 class="mb-1">{{ $pengumuman->judul_pengumuman }}</h5>
                <small class="text-muted"><i class="bi bi-calendar"></i> {{ $pengumuman->tanggal }}</small>
            </div>
            <p class="mb-1">{{ $pengumuman->deskripsi }}</p>
        </a>
        @endforeach
    </div>

    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center" id="paginationPengumuman">
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
