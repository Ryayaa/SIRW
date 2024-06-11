<title>Detail Laporan Masalah</title>

@extends('user-login.index')

@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="card w-100 w-md-75 mx-auto shadow-lg rounded position-relative">
                <div class="card-body mx-4">
                    <h2 class="mb-4 text-center mt-5">{{ $laporan->judul_laporan }}</h2>
                    <div class="date-floating">
                        <p class="card-text"><small class="text-muted"><i class="bi bi-calendar"></i>
                                {{ \Carbon\Carbon::parse($laporan->tanggal_laporan)->translatedFormat('d F Y') }}</small>
                        </p>
                    </div>
                    <div class="pelapor-laporan">
                        @if ($laporan->status_hide == 't')
                            <p class="card-text"><small class="text-muted">Dilaporkan oleh:
                                    {{ $laporan->warga->nama_lengkap }}</small></p>
                        @else
                            <p class="card-text"><small class="text-muted">Dilaporkan oleh:
                                    <em>Anonymous</em></small></p>
                        @endif
                    </div>
                    @if ($laporan->gambar)
                        <div class="text-center laporan-gambar">
                            <a href="#imageModal" data-bs-toggle="modal">
                                <img src="{{ asset('images/' . $laporan->gambar) }}" class="img-fluid mt-3 rounded shadow-sm" alt="{{$laporan->judul_laporan}}">
                            </a>
                        </div>
                    @endif
                    <p class="card-text mt-4">{{ $laporan->deskripsi }}</p>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/' . $laporan->gambar) }}" class="img-fluid rounded" alt="{{$laporan->judul_laporan}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>


    .date-floating {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .pelapor-laporan {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .laporan-gambar img {
        max-height: 50vh;
        object-fit: contain;
        cursor: pointer;
    }

    img {
        max-height: 50vh;
        object-fit: contain;
    }

    .deskripsi-pengumuman {
        font-size: 14px;
        margin-right: 1.5rem;
        margin-left: 1.5rem;
    }

    .card-body small,
    .card-body i {
        font-size: 12px;
        font-weight: 700;
    }

    .card-title {
        font-weight: 700;
    }

    @media (min-width: 575px) {
        .container .card {
            width: 75%;
        }
    }

    @media (max-width: 576px) {
        .deskripsi-pengumuman {
            font-size: 10px;
            margin-right: .5rem;
            margin-left: .5rem;
            font-weight: 600;
        }

        .container .card {
            width: 100%;
        }

        .card-body small,
        .card-body i {
            font-size: 9px;
            font-weight: 800;
        }

        .card-body .card-title {
            font-size: 16px;
        }
    }
</style>
