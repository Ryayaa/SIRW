<title>Daftar Pengumuman</title>
@extends('user-login.index')

@section('content')
<section id="pengumuman" class="pengumuman py-5 mt-5">
    <div class="container">
        <div class="section-header text-center">
            <h2>Daftar Pengumuman</h2>
            <p>Pengumuman Terbaru</p>
        </div>
        <div class="row justify-content-center">
            @foreach ($pengumumans as $pengumuman)
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="pengumuman-item rounded position-relative">
                        <a href="{{ route('pengumuman.detail', $pengumuman->id_pengumuman) }}"></a>
                        <div class="content">
                            <time class="mb-2">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->isoFormat('DD MMMM YYYY') }}</time>
                            <h4>{{ \Illuminate\Support\Str::limit($pengumuman->judul_pengumuman, 65) }}</h4>
                            {{-- <p>{{ \Illuminate\Support\Str::limit($pengumuman->deskripsi, 200) }}</p> --}}
                        </div>
                    </div>
                </div>
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
</section>
@endsection
@push('css')

<style>
    /* Custom CSS for Pengumuman page */
    .pengumuman-item {
        background: linear-gradient(100deg, #f8f9fa, #ffffff);
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background 0.3s ease, transform 0.3s ease;
        border-left: 5px solid #007bff;
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        }

        .pengumuman-item:hover {
            background: linear-gradient(135deg, #ffffff, #f1f1f1);
            transform: translateY(-5px);
            }

            .pengumuman-item time {
                font-size: 0.9rem;
                color: #007bff;
}

.pengumuman-item h4 {
    font-size: 1.5rem;
    margin-top: 10px;
    color: #343a40;
}

.pengumuman-item p {
    font-size: 1rem;
    color: #495057;
    }

    .pengumuman-item a {
        text-decoration: none;
        color: inherit;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        }

        .rounded {
            border-radius: 10px !important;
            }

            /* Responsive styles */
            @media (max-width: 768px) {
                .pengumuman-item {
        padding: 15px;
        margin-bottom: 15px;
        }

        .pengumuman-item h4 {
            font-size: 1.3rem;
            }

            .pengumuman-item p {
                font-size: 0.9rem;
                }
                }

                @media (max-width: 576px) {
                    .pengumuman-item {
                        border-left-width: 3px;
                        }

                        .pengumuman-item h4 {
                            font-size: 1.1rem;
                            }

                            .pengumuman-item p {
                                font-size: 0.8rem;
                                }
                                }
                                </style>
@endpush
