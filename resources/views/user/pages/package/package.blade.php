@extends('user.layout.apps')

@section('title')
    Admin Dashboard
@endsection

@push('after-main-style')
    <link rel="stylesheet" href="{{ asset('wowdash/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/full-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/responsive-package.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=source_environment" />
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('wowdash/js/full-calendar.js') }}"></script>
    <script src="{{ asset('wowdash/js/flatpickr.js') }}"></script>
@endpush

@section('content')
    <div class="container mt-4">
        <h5 class="card-tittle">Pilih Paket Anda</h5>
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('landing-page/images/sakt1.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Paket Tenda Campervan</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('landing-page/images/sak2.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Paket Camping Anti Ribet</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('landing-page/images/sakt3.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Paket Camping Anti Ribet Sultan</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('landing-page/images/sakt4.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Paket Camping Anti Ribet Sultan Plus</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('wowdash/images/standart.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Standart Campsite</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('wowdash/images/deluxe.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Campsite</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('wowdash/images/superdeluxe.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Super Deluxe Campsite</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('wowdash/images/juniorcar.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Junior Campsite Car</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                <div class="card h-100">
                    <img src="{{ asset('wowdash/images/juniormotor.webp') }}" class="card-img-top" alt="paket1">
                    <div class="card-body">
                        <h5 class="card-title">Junior Campsite Motor</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
