<title>Laporan Masalah</title>
@extends('user-login.index')

@section('content')
    <section class="mt-5">

        <div class="container ">
            <div class="section-header text-center">
                <h2 class="">Daftar Laporan Masalah</h2>
            </div>

            <div class="list-group d-flex flex-column align-items-center" id="laporanList">
                @foreach ($laporans as $laporan)
                    <a href="{{ route('laporanMasalah.detail', $laporan->id_laporan_masalah) }}"
                        class=" list-laporan list-group-item list-group-item-action mb-3 shadow-sm rounded"
                        style="border-left: 5px solid #007bff;">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 judul-laporan">{{ $laporan->judul_laporan }}</h5>
                            <small class="text-muted tanggal-laporan"><i class="bi bi-calendar"></i>
                                {{ \Carbon\Carbon::parse($laporan->tanggal_laporan)->translatedFormat('d F Y') }}</small>
                        </div>
                        {{-- <p class="mb-1">{{ $laporan->deskripsi }}</p> --}}
                        <div class="d-flex justify-content-between align-items-center">
                            @if ($laporan->status_hide == 't')
                                <small class="text-muted nama-laporan">Pelapor: {{ $laporan->warga->nama_lengkap }}</small>
                            @else
                                <small class="text-muted nama-laporan">Pelapor: <em>Anonymous</em></small>
                            @endif
                            @if ($laporan->status_pengajuan == 'approved')
                                <span class="badge bg-success text-white">Selesai</span>
                            @elseif($laporan->status_pengajuan == 'wait')
                                <span class="badge bg-warning text-white">Menunggu</span>
                            @else
                            @endif
                        </div>
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
                    @if ($page > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() }}?page={{ $page - 1 }}"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @endif

                    {{-- Link Number --}}
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Link Next --}}
                    @if ($page < $totalPages)
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

<style>
    .section-header h2 {
        font-size: 36px;
        font-weight: 700;
    }

    .judul-laporan {
        font-size: 24px;
        font-weight: 600;
        margin-right: 10px; /* Add space to prevent overlap */
        white-space: nowrap; /* Prevent text wrapping */
        overflow: hidden;
        text-overflow: ellipsis; /* Ellipsis for long text */
        max-width: calc(100% - 150px); /* Adjust the width to prevent overlap with the date */
    }

    .list-group-item {
        overflow: hidden;
        transition: transform 0.2s ease-in-out;
    }

    .list-group-item:hover {
        transform: scale(1.02);
    }

    .badge {
        font-size: 12px;
        padding: 0.5em;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .pagination .page-link {
        color: #007bff;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .pagination .page-link:hover {
        color: #0056b3;
    }

    @media (max-width: 576px) {
        .list-laporan {
            width: 100%;
        }

        .judul-laporan {
            font-size: 16px;
            font-weight: 600;
            max-width: calc(100% - 80px); /* Adjust for smaller screens */
        }

        .section-header h2 {
            font-size: 1.5rem;
        }

        .btn-primary {
            width: 100%;
            font-size: 1rem;
        }

        .pagination .page-link {
            padding: 0.5rem 0.75rem;
        }

        .nama-laporan {
            font-size: 9px;
            font-weight: 700;
        }

        .tanggal-laporan {
            font-size:11px;
            font-weight: 600;
        }

        .badge {
            font-size: 9px;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) {
        .list-laporan {
            width: 90%;
        }

        .judul-laporan {
            font-size: 16px;
            font-weight: 600;
            max-width: calc(100% - 100px); /* Adjust for medium screens */
        }

        .section-header h2 {
            font-size: 1.75rem;
        }

        .btn-primary {
            font-size: 1.125rem;
        }
    }

    @media (min-width: 769px) {
        .list-laporan {
            width: 75%;
        }

        .section-header h2 {
            font-size: 2rem;
        }

        .btn-primary {
            font-size: 1.125rem;
        }
    }
</style>
