@extends('user.layout.app')

@section('title')
    Admin Dashboard
@endsection

@push('after-main-style')
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/remixicon.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/dataTables.min.css') }}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('wowdash/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=source_environment" />
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
@endpush

@section('content')
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body p-24">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                        aria-labelledby="pills-edit-profile-tab" tabindex="0">
                        <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                        <!-- Upload Image Start -->
                        <div class="mb-24 mt-16">
                            <div class="avatar-upload">
                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                    <label for="imageUpload"
                                        class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                        <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                    </label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Upload Image End -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="name"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Username </label>
                                    <input type="text" class="form-control radius-8" id="username"
                                        value="{{ auth()->user()->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="email"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name</label>
                                    <input type="text" class="form-control radius-8" id="name"
                                        value="{{ auth()->user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="number"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                    <input type="email" class="form-control radius-8" id="email"
                                        value="{{ auth()->user()->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="button"
                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
