<title>Kegiatan Warga</title>
@extends('user-login.index')

@section('content')
<section>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <button id="upcoming-btn" class="btn btn-primary me-2">Kegiatan Mendatang</button>
            <button id="past-btn" class="btn btn-outline-secondary">Kegiatan yang Telah Terjadi</button>
        </div>

        <div id="upcoming-activities">
            <h2 class="text-center mt-2">Kegiatan Mendatang</h2>
            @if($upcomingActivities->isEmpty())
                <p class="text-center">Tidak ada kegiatan mendatang yang tersedia.</p>
            @else
                <div class="row mt-4">
                    @foreach($upcomingActivities as $kegiatan)
                    <div class="col-md-6 mb-4">
                        <a href="{{ route('kegiatan.detail', $kegiatan->id_kegiatan_warga) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm">
                                @if($kegiatan->gambar)
                                <img src="{{ asset('images/' . $kegiatan->gambar) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @else
                                <img src="{{ asset('assets/img/faq.jpg') }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center mt-4 mb-4">{{ $kegiatan->nama_kegiatan }}</h5>
                                    <div class="mt-auto">
                                        <p class="card-text"><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                                        <p class="card-text"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
                                        <p class="card-text"><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }} - Selesai</p>
                                        <p class="card-text"><small class="text-muted">Pembuat: {{ $kegiatan->rt->ketuaRt->warga->nama_lengkap }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        {{-- Link Previous --}}
                        @if($pageUpcoming > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() }}?page_upcoming={{ $pageUpcoming - 1 }}&page_past={{ $pagePast }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                        @endif

                        {{-- Link Number --}}
                        @for($i = 1; $i <= $totalPagesUpcoming; $i++)
                        <li class="page-item {{ $pageUpcoming == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ url()->current() }}?page_upcoming={{ $i }}&page_past={{ $pagePast }}">{{ $i }}</a>
                        </li>
                        @endfor

                        {{-- Link Next --}}
                        @if($pageUpcoming < $totalPagesUpcoming)
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() }}?page_upcoming={{ $pageUpcoming + 1 }}&page_past={{ $pagePast }}" aria-label="Next">
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
            @endif
        </div>

        <div id="past-activities" style="display:none;">
            <h2 class="text-center mb-4">Kegiatan yang Telah Terjadi</h2>
            @if($pastActivities->isEmpty())
            <p class="text-center">Tidak ada kegiatan yang telah terjadi.</p>
        @else
        <div class="row mt-4">
            @foreach($pastActivities as $kegiatan)
            <div class="col-md-6 mb-4">
                <a href="{{ route('kegiatan.detail', $kegiatan->id_kegiatan_warga) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        @if($kegiatan->gambar)
                                <img src="{{ asset('images/' . $kegiatan->gambar) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @else
                                <img src="{{ asset('assets/img/faq.jpg') }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center mb-4 mt-4">{{ $kegiatan->nama_kegiatan }}</h5>
                            <div class="mt-auto">
                                <p class="card-text"><strong> Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                                <p class="card-text"><strong> Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
                                <p class="card-text"><strong> Waktu:</strong> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }} - Selesai</p>
                                <p class="card-text"><small class="text-muted"> Pembuat: {{ $kegiatan->rt->ketuaRt->warga->nama_lengkap }}</small></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                {{-- Link Previous --}}
                @if($pagePast > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page_past={{ $pagePast - 1 }}&page_upcoming={{ $pageUpcoming }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
                @endif

                {{-- Link Number --}}
                @for($i = 1; $i <= $totalPagesPast; $i++)
                <li class="page-item {{ $pagePast == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ url()->current() }}?page_past={{ $i }}&page_upcoming={{ $pageUpcoming }}">{{ $i }}</a>
                </li>
                @endfor

                {{-- Link Next --}}
                @if($pagePast < $totalPagesPast)
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page_past={{ $pagePast + 1 }}&page_upcoming={{ $pageUpcoming }}" aria-label="Next">
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
        @endif
        </div>
    </div>
</section>

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const upcomingBtn = document.getElementById('upcoming-btn');
        const pastBtn = document.getElementById('past-btn');
        const upcomingActivities = document.getElementById('upcoming-activities');
        const pastActivities = document.getElementById('past-activities');

        upcomingBtn.addEventListener('click', function() {
            upcomingActivities.style.display = 'block';
            pastActivities.style.display = 'none';
            upcomingBtn.classList.add('btn-primary');
            upcomingBtn.classList.remove('btn-outline-secondary');
            pastBtn.classList.remove('btn-primary');
            pastBtn.classList.add('btn-outline-secondary');
        });

        pastBtn.addEventListener('click', function() {
            upcomingActivities.style.display = 'none';
            pastActivities.style.display = 'block';
            pastBtn.classList.add('btn-primary');
            pastBtn.classList.remove('btn-outline-secondary');
            upcomingBtn.classList.remove('btn-primary');
            upcomingBtn.classList.add('btn-outline-secondary');
        });
    });
</script>
@endpush

@push('css')
<style>
    /* General styling for better visual appeal */
    .section {
        background-color: #f9f9f9;
        padding: 50px 0;
    }

    .card {
        border: 1px solid #e3e3e3;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
</style>
@endpush
@endsection
