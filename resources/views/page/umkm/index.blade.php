<title>Daftar UMKM</title>
@extends('user-login.index')

@section('content')
<section class="umkm">

    <div class="container mt-5">
        <div class="section-header text-center mt-5">
            <h2 class="display-4">Daftar UMKM</h2>
            <p class="lead">Temukan UMKM di sekitar Anda</p>
        </div>

        <!-- Search Bar -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <input type="text" class="form-control form-control-lg" id="searchUMKM" placeholder="Cari UMKM..." value="{{ $search }}">
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

        <div class="row my-2 justify-content-center" id="umkmList">
            @foreach($umkms as $umkm)
            <div class="col-md-6 col-lg-4 col-sm-12 mb-4 ">
                <div class="card h-100 shadow-sm umkm-card " onclick="location.href='{{ route('umkm.detail', $umkm->id_umkm) }}'" style="cursor: pointer;">
                    @if($umkm->gambar)
                    <img src="{{ asset('images/'.$umkm->gambar) }}" class="card-img-top custom-img" alt="{{ $umkm->nama_umkm }}">
                    @else
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar tidak tersedia">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                        <p class="card-text umkm-alamat"><i></i> <strong></strong> {{ $umkm->alamat }}</p>
                        <p class="card-text umkm-telepon"><i class="bi bi-telephone-fill me-2"></i>  {{ $umkm->no_telepon }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center" id="paginationUmkm">
                {{-- Link Previous --}}
                @if($page > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page={{ $page - 1 }}&search={{ $search }}" aria-label="Previous">
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
                    <a class="page-link" href="{{ url()->current() }}?page={{ $i }}&search={{ $search }}">{{ $i }}</a>
                </li>
                @endfor

                {{-- Link Next --}}
                @if($page < $totalPages)
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page={{ $page + 1 }}&search={{ $search }}" aria-label="Next">
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
</section>

@push('css')
<!-- Custom Styles -->
<style>
    .umkm-card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .umkm-card .card-title {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 0.75rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 700;
    }

    .form-control-lg {
        font-size: 1.25rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.3rem;
    }

    .section-header .lead {
        font-weight: 500
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }

    .custom-img {
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 9;
        object-fit: cover;
    }

    @media(max-width:576px){

        .umkm-card{
            margin-left: 20px;
            margin-right: 20px;

        }
    }
</style>
@endpush

@push('js')
<!-- Custom Script for Search Functionality -->
<script>
    document.getElementById('searchUMKM').addEventListener('input', function() {
        let search = this.value;
        window.location.href = '{{ url()->current() }}?search=' + search;
    });
</script>
@endpush

@endsection
