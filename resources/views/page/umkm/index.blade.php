@extends('user-login.index')

@section('content')
<section></section>
<div class="container mt-5">
    <div class="section-header text-center">
        <h1 class="">Daftar UMKM</h1>
    </div>
    <div class="row my-2 j" id="umkmList">
        @foreach($umkms as $umkm)
        @if ($umkm->status_pengajuan =='approved')

        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="card mb-4" onclick="location.href='{{ route('umkm.detail', $umkm->id_umkm) }}'" style="cursor: pointer;">
                @if($umkm->gambar)
                <img src="{{ asset('storage/'.$umkm->gambar) }}" class="card-img-top" alt="{{ $umkm->nama_umkm }}">
                @else
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar tidak tersedia">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                    <p class="card-text"><i class="bi bi-geo-alt-fill"></i> <strong>Alamat:</strong> {{ $umkm->alamat }}</p>
                    <p class="card-text"><i class="bi bi-telephone-fill"></i> <strong>No Telepon:</strong> {{ $umkm->no_telepon }}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center" id="paginationUmkm">
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
