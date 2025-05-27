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
        <h6 class="fw-semibold mb-0">Edit Customer</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('customer.update') }}" method="POST" id="CustomerEditForm">
                @csrf
                <div class="row">
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Customer Code :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Customer Code "
                            name="customer_code" readonly value="{{ $datas->customer_code }}">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Customer Name :
                        </label>
                        <select class="form-select" aria-label="Default select example" name="customer_name">
                            <option>Pilih Nama Customer</option>
                            @foreach ($users as $data)
                                <option value="{{ $data->name }}"
                                    {{ $datas->customer_name == $data->name ? 'selected' : '' }}>
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Telepon :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Nomor Telepon "
                            name="phone" value="{{ $datas->phone }}">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">User ID :
                        </label>
                        <select class="form-select" aria-label="Default select example" name="user_id">
                            <option>Pilih user ID</option>
                            @foreach ($users as $data)
                                <option value="{{ $data->id }}" {{ $datas->user_id == $data->id ? 'selected' : '' }}>
                                    {{ $data->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                        <button type="button"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8"
                            onclick="history.back()">
                            Back
                        </button>
                        <button type="submit"
                            class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
