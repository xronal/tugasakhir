<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Taman Pinus Batu</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- icon -->
    <link rel="icon" href="{{ asset('landing-page/images/logo.webp') }}" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('landing-page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/custom.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('landing-page/css/responsive.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('landing-page/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class=" col-md-2 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('landing-page/images/logo.webp') }}"
                                        alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#fasilitas">Fasilitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#price">List Harga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#faq">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#kontak">Kontak Kami</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                @auth
                    <div class="dropdown">
                        <button class="btn text-primary-600 hover-text-primary px-18 py-11 dropdown-toggle toggle-icon"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa fa-user"
                                aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li><a
                                    class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900">Welcome,
                                    {{ auth()->user()->name }} </a></li>
                            <li><a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900"
                                    href="{{ route('dashboarduser') }}">Profil</a></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="col-md-2">
                        <ul class="email text_align_right">
                            <li class="d_none "><a href="{{ route('login') }}"><i class="fa fa-user"
                                        aria-hidden="true"></i><span class="txt-login">Login</span></a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <!-- end header inner -->
    <!-- end header -->
    <!-- top -->
    <div class="full_bg">
        <div class="slider_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- carousel code -->
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <!-- first slide -->
                                <div class="carousel-item active">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-5">
                                                <div class="board">
                                                    <h3>
                                                        Taman Pinus Campervan Park
                                                    </h3>
                                                    @auth
                                                        <div class="link_btn">
                                                            <a class="btn btn-primary" href="/user/package">Reservasi
                                                                Disini</a>
                                                        </div>
                                                    @endauth
                                                    @guest
                                                        <div class="link_btn">
                                                            <a class="btn btn-primary" href="/login">Reservasi
                                                                Disini</a>
                                                        </div>
                                                    @endguest
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="sliderpr">
                                                    <div class="wrapper">
                                                        <img src="{{ asset('landing-page/images/sakt1.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sak2.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt3.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt4.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt5.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt6.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt7.webp') }}">
                                                        <img src="{{ asset('landing-page/images/sakt8.webp') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end banner -->
        <!-- our class -->
        <div class="class">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage text_align_center" id="fasilitas">
                            <h2>Fasilitas yang bisa dinikmati</h2>
                            <p>Wisata camping campervan di Batu semakin seru dengan fasilitas lengkap di Taman Pinus
                                Campervan Park! Kami menyediakan semua yang anda butuhkan untuk pengalaman camping yang
                                menyenangkan dan nyaman. Nikmati momen berharga orang terdekat dikelilingi oleh
                                keindahan alam yang menyejukkan jiwa!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class1.webp') }}" alt="gambar1" /></i>
                            <h3>Free WIFI</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class2.webp') }}" alt="gambar2" /></i>
                            <h3>Mushola</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class3.webp') }}" alt="gambar3" /></i>
                            <h3>Toilet</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class4.webp') }}" alt="gambar4" /></i>
                            <h3>Wastafel</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class5.webp') }}" alt="gambar5" /></i>
                            <h3>Dapur Umum</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class6.webp') }}" alt="gambar6" /></i>
                            <h3>Cafe Taman Pinus</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('Landing-page/images/class7.webp') }}" alt="gambar7" /></i>
                            <h3>Tempat Kemah</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('Landing-page/images/class8.webp') }}" alt="gambar8" /></i>
                            <h3>Tempat Penyewaan</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="class_box text_align_center" data-aos="zoom-in" data-aos-duration="1000">
                            <i><img src="{{ asset('landing-page/images/class9.webp') }}" alt="gambar9" /></i>
                            <h3>Tempat Hall</h3>
                        </div>
                    </div>
                </div>
                <!-- end our class -->
                <!-- about -->
                <div class="about pl-3" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="container-fluid">
                        <div class="row d_flex">
                            <div class="col-md-6">
                                <div class="titlepage text_align_left" id="about">
                                    <h2>Tentang <br> Taman Pinus Campervan Park</h2>
                                    <p>Wisata camping campervan terbaik di Kota Batu ada di Taman Pinus Campervan Park!
                                        Bosan dengan liburan yang itu-itu saja? Jadi, saatnya mencoba pengalaman camping
                                        yang berbeda dikelilingi hutan pinus yang memukau dan udara segar yang bikin
                                        betah. Selain itu, di sini anda bisa menikmati pengalaman camping seru di alam
                                        terbuka dengan campervan, motorhome, atau kendaraan pribadi. Anda dapat membawa
                                        tenda sendiri atau sewa tenda anti ribet yang sudah disiapkan oleh tim kami.
                                        Dengan kuota campsite yang terbatas, pastikan reservasi lebih awal untuk
                                        mendapatkan spot camping terbaik. </p>
                                    <div class="d-flex align-items-center gap-2 w-100">
                                        <h3 class="pr-5 text-white">Fasilitas</h3>
                                        <div class="w-100 ms-auto">
                                            <div class="progress progress-sm rounded-pill" role="progressbar"
                                                aria-label="Success example" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated rounded-pill bg-primary-600"
                                                    style="width: 90%;"></div>
                                            </div>
                                        </div>
                                        <span class="text-secondary-light line-height-10 text-white pl-2">90%</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 w-100">
                                        <h3 class="pr-4 text-white">Pelayanan</h3>
                                        <div class="w-100 ms-auto">
                                            <div class="progress progress-sm rounded-pill" role="progressbar"
                                                aria-label="Success example" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated rounded-pill bg-primary-600"
                                                    style="width: 95%;"></div>
                                            </div>
                                        </div>
                                        <span class="text-secondary-light line-height-10 text-white pl-2">95%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about_img text_align_center pr-3 pb-5">
                                    <figure><img src="{{ asset('Landing-page/images/about.webp') }}"
                                            alt="foto1" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end about -->
                <!-- skating -->
                <div class="price-list">
                    <div class="titlepage text_align_center" id="price">
                        <h2>Pricelist Camping</h2>
                        <p>Lihat daftar harga layanan Taman Pinus Campervan Park di sini! Kami menyediakan layanan sewa
                            perlengkapan camping lengkap, sehingga Anda tidak perlu membeli peralatan sendiri. Selain
                            itu, kami juga menawarkan Paket Outbond Fun Games dan Paket Outbond Motivasi Team Building
                            yang cocok untuk gathering keluarga, outing sekolah/kampus, serta acara pemerintahan.</p>
                    </div>
                    <div class="sliderpr">
                        <div class="wrapper">
                            <img src="{{ asset('landing-page/images/sakt1.webp') }}">
                            <img src="{{ asset('landing-page/images/sak2.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt3.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt4.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt5.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt6.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt7.webp') }}">
                            <img src="{{ asset('landing-page/images/sakt8.webp') }}">
                        </div>
                    </div>
                </div>
                <!-- end skating -->
                <!-- testimonial -->
                <div class="testimonial">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titlepage text_align_center">
                                    <h2 id="faq">FAQ</h2>
                                </div>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Campsite itu apa ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Campsite adalah sebuah tempat campingnya di Campervan Park. Ada beberapa tipe
                                        Campsite disesuaikan dengan jenis kendaraan dan jumlahnya.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Kalau saya mau camping cuma sewa tendanya saja tanpa sewa Campsite bisa
                                            nggak ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Tidak Bisa, kalau mau sewa tenda dan camping di Taman Pinus Campervan Park harus
                                        bayar :
                                        <ul class="bunder">
                                            <li>Tiket 10k/Orang</li>
                                            <li>Sewa Campsitenya (Lihat di Pricelist Campsite Rate) , dan</li>
                                            <li>Sewa tendanya (Lihat Pricelist Rent a Tent)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Apa beda Junior Campsite dengan Standar Campsite ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Beda luasan campsitenya. Junior Campsite Car itu untuk mobil kecil (City car)
                                        seperti Ayla, Jazz, atau sedan. Standar Campsite ukuran campsitenya lebih luas
                                        daripada junior campsite car.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Kalau saya bawa mobil City Car (Ayla) mau pesan Standar Campsite atau Deluxe
                                            Campsite boleh apa tidak ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Boleh, Bebas saja kalau ingin mendapatkan area camping yang lebih lega.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive">
                                            Apa bedanya Tenda Standar, Tenda Sultan, dan Tenda Sultan Plus ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Semua Tenda di Taman Pinus Campervan Park sama model Dome Seperti ini. Tenda
                                        Standar di dalamnya memakai matras dan sleeping bag. Sedangkan Tenda Sulta di
                                        dalamnya memakai kasur, bantal, dan bed cover seperti ini. Lalu unutk Tenda
                                        Sultan Plus sama seperti tenda Sultan biasa tapi sudah termasuk Breakfast untuk
                                        4 orang.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                            aria-controls="collapseSix">
                                            Toiletnya bersih nggak ? Ada Fotonya ?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Toilet max setiap 2 jam sekali pasti dibersihkan. Ada pilihan toilet jongkok
                                        maupun toilet duduk.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end testimonial -->
                <!--  footer -->
                <footer>
                    <div class="footer">
                        <hr class="ke1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="infoma" id="kontak">
                                        <h3>Contact Us</h3>
                                        <ul class="conta">
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><a
                                                    href="https://www.google.com/maps/place/Taman+Pinus+Campervan+Park/@-7.904017,112.5220532,15z/data=!4m6!3m5!1s0x2e7887e3735eaca9:0xa6b9aff595e38f88!8m2!3d-7.904017!4d112.5220532!16s%2Fg%2F11qnk0jdms?entry=ttu&g_ep=EgoyMDI1MDIxMi4wIKXMDSoASAFQAw%3D%3D">Location</a>
                                            </li>
                                            <li><i class="fa fa-phone" aria-hidden="true"></i><a
                                                    href="https://api.whatsapp.com/send/?phone=6281334234368&text&type=phone_number&app_absent=0">+62
                                                    813-3423-4368 (Whatsapp)</a></li>
                                            <li> <i class="fa fa-envelope"
                                                    aria-hidden="true"></i>tamanpinusbatu@gmail.com</li>
                                        </ul>
                                    </div>
                                    <div class="infoma">
                                        <ul class="social_icon">
                                            <li><a href="https://www.facebook.com/campinggroundbatu"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a
                                                    href="https://www.tiktok.com/@tamanpinusbatu?is_from_webapp=1&sender_device=pc"><i
                                                        class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                                            <li><a href="https://www.instagram.com/tamanpinuscamperpark/"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row border_left">
                                        <div class="col-md-12">
                                            <iframe class="maps"
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15807.6573856854!2d112.5220532!3d-7.904017!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887e3735eaca9%3A0xa6b9aff595e38f88!2sTaman%20Pinus%20Campervan%20Park!5e0!3m2!1sen!2sid!4v1739683363698!5m2!1sen!2sid"
                                                width="600" height="250" style="border:0;" allowfullscreen=""
                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="ke1">
                        <div class="copyright">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Created by Ronal Anggara</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end footer -->
                <!-- Javascript files-->
                <script src="{{ asset('landing-page/js/jquery.min.js') }}"></script>
                <script src="{{ asset('landing-page/js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('landing-page/js/jquery-3.0.0.min.js') }}"></script>
                <!-- sidebar -->
                <script src="{{ asset('landing-page/js/custom.js') }}"></script>
                <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                <script>
                    AOS.init();
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
