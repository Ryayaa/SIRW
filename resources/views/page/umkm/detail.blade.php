<title>Detail UMKM</title>
@extends('user-login.index')

@section('content')
    <section>

        <div class="container mt-5">
            <div class="section-header text-center">
                <h2 class="">{{ $umkm->nama_umkm }}</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="">
                        <div class="card-body">
                            @if ($umkm->gambar)
                                <img src="{{ asset('images/'.$umkm->gambar) }}"
                                    class="img-fluid mb-3 mx-auto d-block text-center" alt="{{ $umkm->nama_umkm }}">
                                <p><strong>Alamat:</strong> <br> {{ $umkm->alamat }} </p>
                            @else
                                <img src="https://via.placeholder.com/300x200" class="img-fluid mb-3 text-center"
                                    alt="Gambar tidak tersedia">
                                <p><strong>Alamat:</strong> <br> {{ $umkm->alamat }} ?</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <div class="card-body">
                            <p><strong></strong> {{ $umkm->deskripsi }} </p>

                            @php
                                $phone_number = $umkm->no_telepon;
                                if (substr($phone_number, 0, 1) == '0') {
                                    $phone_number = '62' . substr($phone_number, 1);
                                }
                            @endphp

                            <p class="text-left"><strong>Kontak yang dapat dihubungi :</strong> </p>
                            <a href="https://api.whatsapp.com/send/?phone={{ $phone_number }}&text&type=phone_number&app_absent=0"
                                class=" text-white btn btn-success"><i
                                    class="bi bi-whatsapp me-2"></i>+{{ $phone_number }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        /* Custom CSS for UMKM page */

        .card {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            aspect-ratio: 16 / 9;
            object-fit: cover;
            height: 200px;
            width: 100%
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .card-body p strong {
            color: #333;
        }

        .card-body p:last-child {
            margin-bottom: 0;
        }
    </style>
@endpush
