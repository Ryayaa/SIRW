@extends('user-login.index')

@section('content')
<section>

    <div class="container mt-5">

        <div class="text-center">
            <button id="upcoming-btn" class="btn btn-primary">Kegiatan Mendatang</button>
            <button id="past-btn" class="btn btn-secondary">Kegiatan yang Telah Terjadi</button>
        </div>

        <div id="upcoming-activities">
        <h2 class="text-center mt-5">Kegiatan Mendatang</h2>
        @if($upcomingActivities->isEmpty())
            <p class="text-center">Tidak ada kegiatan mendatang yang tersedia.</p>
        @else
            <div class="row">
                @foreach($upcomingActivities as $kegiatan)
                <div class="col-md-6 mb-4">
                        <a href="{{ route('kegiatan.detail', $kegiatan->id_kegiatan_warga) }}" class="text-decoration-none text-dark">
                            <div class="card h-100">
                                @if($kegiatan->gambar)
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center">{{ $kegiatan->nama_kegiatan }}</h5>
                                    <p class="card-text"><strong><i class="bi bi-geo-alt"></i> Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                                    <p class="card-text"><strong><i class="bi bi-calendar"></i> Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
                                    <p class="card-text"><strong><i class="bi bi-clock"></i> Waktu:</strong> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }} - Selesai</p>
                                    <p class="card-text mt-auto"><small class="text-muted"><i class="bi bi-person"></i> Pembuat: {{ $kegiatan->rt->nama_lengkap }}</small></p>
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
            <h2 class="text-center mt-5">Kegiatan yang Telah Terjadi</h2>
            @if($pastActivities->isEmpty())
            <p class="text-center">Tidak ada kegiatan yang telah terjadi.</p>
        @else
        <div class="row">
            @foreach($pastActivities as $kegiatan)
            <div class="col-md-6 mb-4">
                        <a href="{{ route('kegiatan.detail', $kegiatan->id_kegiatan_warga) }}" class="text-decoration-none text-dark">
                            <div class="card h-100">
                                @if($kegiatan->gambar)
                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center">{{ $kegiatan->nama_kegiatan }}</h5>
                                    <p class="card-text"><strong><i class="bi bi-geo-alt"></i> Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
                                    <p class="card-text"><strong><i class="bi bi-calendar"></i> Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
                                    <p class="card-text"><strong><i class="bi bi-clock"></i> Waktu:</strong> {{ \Carbon\Carbon::parse($kegiatan->waktu)->format('H:i') }} - Selesai</p>
                                    <p class="card-text mt-auto"><small class="text-muted"><i class="bi bi-person"></i> Pembuat: {{ $kegiatan->rt->nama_lengkap }}</small></p>
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
                upcomingBtn.classList.remove('btn-secondary');
                pastBtn.classList.remove('btn-primary');
                pastBtn.classList.add('btn-secondary');
            });

            pastBtn.addEventListener('click', function() {
                upcomingActivities.style.display = 'none';
                pastActivities.style.display = 'block';
                pastBtn.classList.add('btn-primary');
                pastBtn.classList.remove('btn-secondary');
                upcomingBtn.classList.remove('btn-primary');
                upcomingBtn.classList.add('btn-secondary');
            });
        });
</script>

@endpush
@endsection
