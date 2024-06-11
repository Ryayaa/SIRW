<title>Detail Pengumuman</title>

@extends('user-login.index')

@section('content')
    <section>
        <div class="container mt-5">
            <div class="card mx-auto shadow-lg border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted"><i class="bi bi-person me-1"></i> Pembuat:
                            {{ $pengumuman->rt->nama_lengkap }}</small>
                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> {{ $pengumuman->tanggal }}</small>
                    </div>
                    <h3 class="card-title text-center my-4">{{ $pengumuman->judul_pengumuman }}</h3>
                    @if ($pengumuman->gambar)
                        <div class="text-center mb-4">
                            <a href="#imageModal" data-bs-toggle="modal">
                                <img src="{{ asset('images/'.$pengumuman->gambar) }}"
                                    class="img-fluid rounded w-75" alt="{{$pengumuman->judul_pengumuman}}">
                            </a>
                        </div>
                    @endif
                    <p class="deskripsi-pengumuman card-text mt-4">{{ $pengumuman->deskripsi }}</p>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Gambar Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/'.$pengumuman->gambar) }}" class="img-fluid rounded"
                            alt="{{$pengumuman->judul_pengumuman}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .img-fluid {
        cursor: pointer;
    }

    img{
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
    .card-title{
        font-weight: 700;
    }

    @media(min-width:575px) {
        .container .card {
            width: 75%;
        }
    }

    @media(max-width:576px) {
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
