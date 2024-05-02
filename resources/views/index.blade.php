<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Selamat Datang di SIRUWA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    {{-- <link href="{{ asset('assets/css/variables.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/variables-blue.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/variables-green.css') }}" rel="stylesheet"> --}}
    <!-- <link href="{{ asset('assets/css/variables-orange.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/css/variables-purple.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/css/variables-red.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('assets/css/variables-pink.css') }}" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>


<!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    @extends('header')
    <!-- End Header -->
    {{-- @extends('hero') --}}



    <!-- ======= Hero Section ======= -->
    <main id="main">
        <section id="hero-static">
            <div class="hero-static">
                <div class="hero-bg"></div> <!-- Pindahkan lapisan warna biru ke sini -->
                <div class="container d-flex flex-column justify-content-left align-items-lg-start text-start position-relative"
                    data-aos="zoom-out">
                    <h2 class="welcome">Website RW 03 Jatimulyo</h2>
                    <h2><span>Selamat Datang</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis fugiat temporibus</p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero Section -->

        <!-- ======= Pengumuman Section ======= -->
        <section id="pengumuman" class="pengumuman">
            <div class="container">
                <div class="section-header">
                    <h2>Pengumuman</h2>
                    <p>Pengumuman Terbaru</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="pengumuman-item position-relative rounded">
                            <div class="content">
                                <time class="mb-2 d-block">12 April 2024</time>
                                <h4><a href="#" class="stretched-link d-block mb-3">Pengumuman 1</a></h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus pariatur
                                    inventore, accusantium
                                    quas consectetur deleniti culpa eveniet amet sint, repellat dignissimos illum
                                    suscipit soluta, nostrum
                                    doloribus magni! Placeat, aliquid nemo.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="pengumuman-item position-relative rounded">
                            <div class="content">
                                <time class="mb-2 d-block">14 Mei 2024</time>
                                <h4><a href="#" class="stretched-link d-block mb-3">Pengumuman 2</a></h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus pariatur
                                    inventore, accusantium
                                    quas consectetur deleniti culpa eveniet amet sint, repellat dignissimos illum
                                    suscipit soluta, nostrum
                                    doloribus magni! Placeat, aliquid nemo.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="pengumuman-item position-relative rounded">
                            <div class="content">
                                <time class="mb-2 d-block">19 Agustus 2024</time>
                                <h4><a href="#" class="stretched-link d-block mb-3">Pengumuman 3</a></h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus pariatur
                                    inventore, accusantium
                                    quas consectetur deleniti culpa eveniet amet sint, repellat dignissimos illum
                                    suscipit soluta, nostrum
                                    doloribus magni! Placeat, aliquid nemo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="prevBtn"><i class="bi bi-caret-left-fill"></i></button>
                    <button class="btn btn-primary" id="nextBtn"><i class="bi bi-caret-right-fill"></i></button>
                </div>
            </div>
        </section>

        <!-- ======= UMKM Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>UMKM Di Sekitar</h2>
                    <p>Daftar UMKM</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid"
                                    alt=""></div>
                            <h3 class="post-title">UMKM 1</h3>
                            <div class="meta">

                                <span class="post-author">Alamat</span>
                            </div>
                            <p class="umkm-alamat">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non fugit quia
                                delectus sapiente necessitatibus molestiae dolorem, id sit deserunt saepe?</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Lihat
                                    Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid"
                                    alt=""></div>
                            <h3 class="post-title">UMKM 2</h3>
                            <div class="meta">

                                <span class="post-author">Alamat</span>
                            </div>
                            <p class="umkm-alamat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci animi aut explicabo ab,
                                a similique expedita temporibus exercitationem omnis nobis!</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Lihat
                                    Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid"
                                    alt=""></div>
                            <h3 class="post-title">UMKM 3</h3>
                            <div class="meta">

                                <span class="post-author">Alamat</span>
                            </div>
                            <p class="umkm-alamat">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro voluptate voluptatem
                                nobis harum accusantium recusandae reprehenderit quam deleniti repudiandae.</p>
                            <a href="blog-details.html" class="readmore stretched-link"><span>Lihat
                                    Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Berita Dan Kegiatan Section ======= -->
        <section id="berita" class="berita" data-aos="zoom-out">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="section-header">
                            <h2 class="text-center">Berita dan Kegiatan</h2>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <a href="single.html" class="article-link">
                            <article class="article-list">
                                <div class="inner row d-flex">
                                    <div class="col-md-6">
                                        <figure class="rounded">
                                            <img src="assets/img/faq.jpg" class="img-fluid" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="details">
                                            <div class="detail">
                                                <time>December 19, 2016</time>
                                            </div>
                                            <h1 class="berita-title">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Nisi itaque aspernatur repudiandae explicabo adipisci
                                                exercitationem, dolorem omnis beatae in assumenda.</h1>
                                            <p class="berita-paragraph">Donec consequat, arcu at ultrices sodales, quam
                                                erat aliquet diam, sit amet interdum libero nunc accumsan nisi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                    <!-- Akhir Kolom 1 -->

                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <a href="single.html" class="article-link">
                            <article class="article-list">
                                <div class="inner row d-flex">
                                    <div class="col-md-6">
                                        <figure class="rounded">
                                            <img src="assets/img/faq.jpg" class="img-fluid" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="details">
                                            <div class="detail">
                                                <time>December 19, 2016</time>
                                            </div>
                                            <h1 class="berita-title">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Nisi itaque aspernatur repudiandae explicabo adipisci
                                                exercitationem, dolorem omnis beatae in assumenda.</h1>
                                            <p class="berita-paragraph">Donec consequat, arcu at ultrices sodales, quam
                                                erat aliquet diam, sit amet interdum libero nunc accumsan nisi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                    <!-- Akhir Kolom 2 -->
                </div>
                <!-- Baris 2 -->
                <div class="row mb-4">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <a href="single.html" class="article-link">
                            <article class="article-list">
                                <div class="inner row d-flex">
                                    <div class="col-md-6">
                                        <figure class="rounded">
                                            <img src="assets/img/faq.jpg" class="img-fluid" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="details">
                                            <div class="detail">
                                                <time>December 19, 2016</time>
                                            </div>
                                            <h1 class="berita-title">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Nisi itaque aspernatur repudiandae explicabo adipisci
                                                exercitationem, dolorem omnis beatae in assumenda.</h1>
                                            <p class="berita-paragraph">Donec consequat, arcu at ultrices sodales, quam
                                                erat aliquet diam, sit amet interdum libero nunc accumsan nisi.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                    <!-- Akhir Kolom 1 -->

                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <a href="single.html" class="article-link">
                            <article class="article-list">
                                <div class="inner row d-flex">
                                    <div class="col-md-6">
                                        <figure class="rounded">
                                            <img src="assets/img/faq.jpg" class="img-fluid" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="details">
                                            <div class="detail">
                                                <time>December 19, 2016</time>
                                            </div>
                                            <h1 class="berita-title">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Nisi itaque aspernatur repudiandae explicabo adipisci
                                                exercitationem, dolorem omnis beatae in assumenda.</h1>
                                            <p class="berita-paragraph">Donec consequat, arcu at ultrices sodales, quam
                                                erat aliquet diam, sit amet interdum libero nunc accumsan nisi.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                    <!-- Akhir Kolom 2 -->
                </div>
                <!-- Akhir Baris 2 -->

                <!-- Tombol "Lihat Selengkapnya" -->
                <div class="row">
                    <div class="col-md-12 text-center m-2">
                        <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- End Berita Dan Kegiatan -->


        <!-- ======= Contact Section ======= -->
        {{-- <section id="contact" class="contact">

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            </div>
        </section><!-- End Contact Section --> --}}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @extends('footer')
    <!-- ======= End Footer ======= -->


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
