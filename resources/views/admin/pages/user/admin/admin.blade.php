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
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Admin Details</h6>
    </div>

    <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sm btn-primary-600"><i class="ri-add-line"></i> <a
                        href="{{ route('admin.add') }}">Create New Admin</a></button>
            </div>
        </div>

        <div class="dashboard-main-body">
            <div class="card h-100 p-0 radius-12">
                <div class="card-body p-24">
                    <div class="row g-4">
                        @foreach ($datas as $data)
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
                                <div class="position-relative border radius-16 p-3 text-center h-100">
                                    <h6 class="text-lg mb-0 mt-4">{{ $data->admin_name }}</h6>
                                    <span class="text-secondary-light mb-16 d-block">{{ $data->email }}</span>

                                    <div
                                        class="position-relative bg-danger-gradient-light radius-8 p-12 d-flex flex-column align-items-center gap-1 mt-3">
                                        <h6 class="text-md mb-0">{{ $data->job }}</h6>
                                        <span class="text-secondary-light text-sm mb-0">Job</span>
                                    </div>
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{ $data->admin_code }}"
                                        class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        View Profile
                                        <iconify-icon icon="solar:alt-arrow-right-linear"
                                            class="icon text-xl line-height-1"></iconify-icon>
                                    </a>
                                    <div class="card-body p-24">
                                        <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
                                            <a class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-success btn-edit"
                                                href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $data->admin_code }}"><iconify-icon
                                                    icon="mdi:edit" class="text-xl"></iconify-icon></a>
                                            <a href="{{ route('admin.destroy', ['id' => $data->admin_code]) }}"
                                                class="btn btn-warning-600 radius-8 p-20 w-20-px h-20-px d-flex align-items-center justify-content-center gap-2 bg-red">
                                                <iconify-icon icon="mdi:delete-outline" class="text-xl"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.user.admin.detail-admin')
    @include('admin.pages.user.admin.edit-admin')
@endsection
