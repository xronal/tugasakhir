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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const adminSelect = document.getElementById('admin_name_select');
            const emailInput = document.getElementById('emailField');
            const userIdInput = document.getElementById('userIdField');
            const usernameInput = document.getElementById('usernameField');

            adminSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const email = selectedOption.getAttribute('data-email');
                const userId = selectedOption.getAttribute(
                    'data-user_id'); // <- data-user_id, bukan data-userid
                const username = selectedOption.getAttribute('data-username');

                emailInput.value = email;
                userIdInput.value = userId;
                usernameInput.value = username;
            });
        });
        console.log({
            email,
            userId,
            username
        });
    </script>
@endpush

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Tambah Customer</h6>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Admin Code :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Admin Code "
                            name="admin_code">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Admin Name :
                        </label>
                        <select class="form-select" aria-label="Default select example" id="admin_name_select"
                            name="admin_name">
                            <option selected>Pilih Admin Name</option>
                            @foreach ($admins as $data)
                                <option value="{{ $data->name }}" data-email="{{ $data->email }}"
                                    data-user_id="{{ $data->id }}" data-username="{{ $data->username }}">
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email :
                        </label>
                        <input type="text" class="form-control radius-8" id="emailField" name="email" readonly>
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Telepon :
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Nomor Telepon "
                            name="phone">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Job:
                        </label>
                        <input type="text" class="form-control radius-8" placeholder="Enter Job Admin " name="job">
                    </div>
                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">User ID :
                        </label>
                        <input type="text" class="form-control radius-8" id="userIdField" name="user_id" readonly>
                    </div>

                    <div class="col-12 mb-20">
                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">Username :
                        </label>
                        <input type="text" class="form-control radius-8" id="usernameField" name="username" readonly>
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
