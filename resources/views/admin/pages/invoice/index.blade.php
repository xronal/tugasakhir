@extends('admin.layout.app')

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
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
@endpush

@section('content')
    <div class="navbar-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-4">
                    <button type="button" class="sidebar-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                        <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                    </button>
                    <button type="button" class="sidebar-mobile-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                    </button>
                    <form class="navbar-search">
                        <input type="text" name="search" placeholder="Search">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <button type="button" data-theme-toggle
                        class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                    <div class="dropdown d-none d-sm-inline-block">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <img src="assets/images/lang-flag.png" alt="image"
                                class="w-24 h-24 object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Choose Your Language</h6>
                                </div>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">
                                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="english">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag1.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">English</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="english">
                                </div>

                                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="japan">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag2.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">Japan</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="japan">
                                </div>

                                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="france">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag3.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">France</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="france">
                                </div>

                                <div class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="germany">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag4.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">Germany</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="germany">
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="korea">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag5.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">South Korea</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="korea">
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="bangladesh">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag6.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">Bangladesh</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="bangladesh">
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="india">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag7.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">India</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="india">
                                </div>
                                <div class="form-check style-check d-flex align-items-center justify-content-between">
                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="canada">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="assets/images/flags/flag8.png" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">Canada</span>
                                        </span>
                                    </label>
                                    <input class="form-check-input" type="radio" name="crypto" id="canada">
                                </div>
                            </div>
                        </div>
                    </div><!-- Language dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Message</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                            <img src="assets/images/notification/profile-3.png" alt="">
                                            <span
                                                class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                            <img src="assets/images/notification/profile-4.png" alt="">
                                            <span
                                                class="w-8-px h-8-px  bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">2</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                            <img src="assets/images/notification/profile-5.png" alt="">
                                            <span
                                                class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                            <img src="assets/images/notification/profile-6.png" alt="">
                                            <span
                                                class="w-8-px h-8-px bg-neutral-300 rounded-circle position-absolute end-0 bottom-0"></span>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-neutral-400 rounded-circle">0</span>
                                    </div>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-40-px h-40-px rounded-circle flex-shrink-0 position-relative">
                                            <img src="assets/images/notification/profile-7.png" alt="">
                                            <span
                                                class="w-8-px h-8-px bg-success-main rounded-circle position-absolute end-0 bottom-0"></span>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Kathryn Murphy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">hey! there
                                                i’m...</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span class="text-sm text-secondary-light flex-shrink-0">12:30 PM</span>
                                        <span
                                            class="mt-4 text-xs text-base w-16-px h-16-px d-flex justify-content-center align-items-center bg-warning-main rounded-circle">8</span>
                                    </div>
                                </a>

                            </div>
                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Message</a>
                            </div>
                        </div>
                    </div><!-- Message dropdown end -->

                    <div class="dropdown">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">
                            <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                            <div
                                class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                                </div>
                                <span
                                    class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">05</span>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span
                                            class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            <iconify-icon icon="bitcoin-icons:verify-outline"
                                                class="icon text-xxl"></iconify-icon>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Congratulations</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Your profile has
                                                been Verified. Your profile has been Verified</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span
                                            class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            <img src="assets/images/notification/profile-1.png" alt="">
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Ronald Richards</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">You can stitch
                                                between artboards</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span
                                            class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            AM
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Arlene McCoy</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between bg-neutral-50">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span
                                            class="w-44-px h-44-px bg-success-subtle text-success-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            <img src="assets/images/notification/profile-2.png" alt="">
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Annette Black</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>

                                <a href="javascript:void(0)"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span
                                            class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            DR
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">Darlene Robertson</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">Invite you to
                                                prototyping</p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">23 Mins ago</span>
                                </a>
                            </div>

                            <div class="text-center py-12 px-16">
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold text-md">See All
                                    Notification</a>
                            </div>

                        </div>
                    </div><!-- Notification dropdown end -->

                    <div class="dropdown">
                        <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                            data-bs-toggle="dropdown">
                            <img src="assets/images/user.png" alt="image"
                                class="w-40-px h-40-px object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-2">Shaidul Islam</h6>
                                    <span class="text-secondary-light fw-medium text-sm">Admin</span>
                                </div>
                                <button type="button" class="hover-text-danger">
                                    <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                </button>
                            </div>
                            <ul class="to-top-list">
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="view-profile.html">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> My
                                        Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="email.html">
                                        <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon>
                                        Inbox</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="company.html">
                                        <iconify-icon icon="icon-park-outline:setting-two"
                                            class="icon text-xl"></iconify-icon> Setting</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                        href="javascript:void(0)">
                                        <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log
                                        Out</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Profile dropdown end -->
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Invoice List</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Invoice List</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <span>Show</span>
                        <select class="form-select form-select-sm w-auto">
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                    </div>
                    <div class="icon-field">
                        <input type="text" name="#0" class="form-control form-control-sm w-auto"
                            placeholder="Search">
                        <span class="icon">
                            <iconify-icon icon="ion:search-outline"></iconify-icon>
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <select class="form-select form-select-sm w-auto">
                        <option>Satatus</option>
                        <option>Paid</option>
                        <option>Pending</option>
                    </select>
                    <a href="invoice-add.html" class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i> Create
                        Invoice</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                    <label class="form-check-label" for="checkAll">
                                        S.L
                                    </label>
                                </div>
                            </th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Name</th>
                            <th scope="col">Issued Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check1">
                                    <label class="form-check-label" for="check1">
                                        01
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list1.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                                </div>
                            </td>
                            <td>25 Jan 2024</td>
                            <td>$200.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2">
                                        02
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list2.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                                </div>
                            </td>
                            <td>25 Jan 2024</td>
                            <td>$200.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3">
                                        03
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list3.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                                </div>
                            </td>
                            <td>10 Feb 2024</td>
                            <td>$200.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4">
                                        04
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#526587</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list4.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Eleanor Pena</h6>
                                </div>
                            </td>
                            <td>10 Feb 2024</td>
                            <td>$150.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check5">
                                    <label class="form-check-label" for="check5">
                                        05
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#105986</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list5.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Leslie Alexander</h6>
                                </div>
                            </td>
                            <td>15 March 2024</td>
                            <td>$150.00</td>
                            <td> <span
                                    class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Pending</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check6">
                                    <label class="form-check-label" for="check6">
                                        06
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#526589</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list6.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Albert Flores</h6>
                                </div>
                            </td>
                            <td>15 March 2024</td>
                            <td>$150.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check7">
                                    <label class="form-check-label" for="check7">
                                        07
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#526520</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list7.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Jacob Jones</h6>
                                </div>
                            </td>
                            <td>27 April 2024</td>
                            <td>$250.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check8">
                                    <label class="form-check-label" for="check8">
                                        08
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list8.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Jerome Bell</h6>
                                </div>
                            </td>
                            <td>27 April 2024</td>
                            <td>$250.00</td>
                            <td> <span
                                    class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Pending</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check9">
                                    <label class="form-check-label" for="check9">
                                        09
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#200257</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list9.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Marvin McKinney</h6>
                                </div>
                            </td>
                            <td>30 April 2024</td>
                            <td>$250.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="" id="check110">
                                    <label class="form-check-label" for="check110">
                                        10
                                    </label>
                                </div>
                            </td>
                            <td><a href="javascript:void(0)" class="text-primary-600">#526525</a></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/user-list/user-list10.png" alt=""
                                        class="flex-shrink-0 me-12 radius-8">
                                    <h6 class="text-md mb-0 fw-medium flex-grow-1">Cameron Williamson</h6>
                                </div>
                            </td>
                            <td>30 April 2024</td>
                            <td>$250.00</td>
                            <td> <span
                                    class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-24">
                    <span>Showing 1 to 10 of 12 entries</span>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        <li class="page-item">
                            <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                                href="javascript:void(0)"><iconify-icon icon="ep:d-arrow-left"
                                    class="text-xl"></iconify-icon></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-primary-600 text-white fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                                href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                                href="javascript:void(0)">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-primary-50 text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px"
                                href="javascript:void(0)">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-secondary-light fw-medium radius-4 border-0 px-10 py-10 d-flex align-items-center justify-content-center h-32-px w-32-px bg-base"
                                href="javascript:void(0)"> <iconify-icon icon="ep:d-arrow-right"
                                    class="text-xl"></iconify-icon> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <footer class="d-footer">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <p class="mb-0">© 2024 WowDash. All Rights Reserved.</p>
            </div>
            <div class="col-auto">
                <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
            </div>
        </div>
    </footer>
    </main>
@endsection
