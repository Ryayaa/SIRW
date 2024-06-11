@extends('user-login.index')

@section('content')
<section class="pt-5 mt-5">
    <div class="container">
        <!-- RW Section -->
        <div class="row my-4">
            <div class="col-12 text-center">
                <h2 class="section-title">Struktur Pengurus RW</h2>
            </div>
        </div>

        <div class="row my-4 justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-8">
                <div class="card card-custom">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Ketua RW</h3>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="">
                            <p><strong>Nama:</strong> {{ $rw->nama_lengkap }}</p>
                            <p><strong>Alamat:</strong> {{ $rw->alamat }}</p>
                        </div>
                        <div class="">
                            <p><strong>Telepon:</strong> {{ $rw->no_telepon }}</p>
                            @php
                                $rw_phone_number = $rw->no_telepon;
                                if (substr($rw_phone_number, 0, 1) == '0') {
                                    $rw_phone_number = '62' . substr($rw_phone_number, 1);
                                }
                            @endphp
                            <a href="https://wa.me/{{ $rw_phone_number }}" target="_blank" class="btn btn-success">
                                <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RT Section -->
        <div class="row my-4">
            <div class="col-12 text-center">
                <h3 class="section-title">Ketua RT</h3>
            </div>
        </div>

        <div class="row my-2 justify-content-center">
            @foreach ($rts as $rt)
            <div class="col-md-6 col-lg-4 col-sm-8 d-flex align-items-stretch">
                <div class="card card-custom mb-4 w-100">
                    <div class="card-header text-center bg-success text-white">
                        <h4>RT {{ $rt->no_rt }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="">
                            <p><strong>Nama:</strong> {{ $rt->nama_lengkap }}</p>
                            <p><strong>Alamat:</strong> {{ $rt->alamat }}</p>
                        </div>
                        <div class="mt-auto">
                            <p><strong>Telepon:</strong> {{ $rt->no_telepon }}</p>

                            @php
                                $rt_phone_number = $rt->no_telepon;
                                if (substr($rt_phone_number, 0, 1) == '0') {
                                    $rt_phone_number = '62' . substr($rt_phone_number, 1);
                                }
                            @endphp
                            <a href="https://wa.me/{{ $rt_phone_number }}" target="_blank" class="btn btn-success">
                                <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Custom Card Styling */
    .card-custom {
        transition: transform 0.3s, box-shadow 0.3s;
        border: 0;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    /* Ensure cards have the same height */
    .card-body {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Section Title Styling */
    .section-title {
        font-size: 2rem;
        /* margin-bottom: 1.5rem; */
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 50%;
        height: 3px;
        background: #007bff;
        margin: 0.5rem auto 0;
    }

    /* Card Header Styling */
    .card-header {
        font-size: 1.5rem;
        padding: 1rem 0;
    }

    .card-body p {
        font-size: 1rem;
        margin: 0.5rem 0;
    }

    .btn-success {
        background-color: #25d366;
        border-color: #25d366;
    }

    .btn-success:hover {
        background-color: #1ebe57;
        border-color: #1ebe57;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-header {
            font-size: 1.25rem;
        }

        .card-body p {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .card-header {
            font-size: 1rem;
        }

        .card-body p {
            font-size: 0.8rem;
        }
    }
</style>
@endsection
