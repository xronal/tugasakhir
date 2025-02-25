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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=source_environment" />
@endpush

@push('after-main-script')
    <script src="{{ asset('wowdash/js/lib/apexcharts.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/dataTables.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('wowdash/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
@endpush

@section('content')
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-header border-bottom bg-base py-16 px-24">
                <h6 class="text-lg fw-semibold mb-0">Pilih Ground untuk dipesan</h6>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group2" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck12">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck12">D-05</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group3" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck13">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck13">D-06</label>

                    <input type="checkbox" class="btn-check" id="btncheck16">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck16">S-11</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group3" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck14">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck14">SD-2</label>

                    <input type="checkbox" class="btn-check" id="btncheck17">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck17">S-10</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group3" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck15">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck15">D-07</label>

                    <input type="checkbox" class="btn-check" id="btncheck18">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck18">S-09</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group4" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck1">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck1">JC-07</label>

                    <input type="checkbox" class="btn-check" id="btncheck2">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck2">JM-04</label>

                    <input type="checkbox" class="btn-check" id="btncheck27">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck27">D-01</label>

                    <input type="checkbox" class="btn-check" id="btncheck19">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck19">D-08</label>

                    <input type="checkbox" class="btn-check" id="btncheck20">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck20">JC-03</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group4" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck3">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck3">JC-06</label>

                    <input type="checkbox" class="btn-check" id="btncheck4">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck4">JM-03</label>

                    <input type="checkbox" class="btn-check" id="btncheck24">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck24">D-02</label>

                    <input type="checkbox" class="btn-check" id="btncheck21">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck21">JC-02</label>

                    <input type="checkbox" class="btn-check" id="btncheck22">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck22">D-09</label>

                    <input type="checkbox" class="btn-check" id="btncheck23">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck23">S-08</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group4" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck5">
                    <label class="btn btn-outline-primary-600 px-20 py-11 " for="btncheck5">JC-05</label>

                    <input type="checkbox" class="btn-check" id="btncheck6">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck6">JM-02</label>

                    <input type="checkbox" class="btn-check" id="btncheck25">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck25">D-03</label>

                    <input type="checkbox" class="btn-check" id="btncheck32">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck32">JC-01</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group4" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck7">
                    <label class="btn btn-outline-primary-600 px-20 py-11 " for="btncheck7">JC-04</label>

                    <input type="checkbox" class="btn-check" id="btncheck8">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck8">JM-01</label>

                    <input type="checkbox" class="btn-check" id="btncheck26">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck26">D-04</label>

                    <input type="checkbox" class="btn-check" id="btncheck30">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck30">SD-1</label>

                    <input type="checkbox" class="btn-check" id="btncheck31">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck31">D-10</label>

                    <input type="checkbox" class="btn-check" id="btncheck33">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck33">S-04</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group1" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck9">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck9">S-16</label>

                    <input type="checkbox" class="btn-check" id="btncheck28">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck28">S-13</label>

                    <input type="checkbox" class="btn-check" id="btncheck34">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck34">S-03</label>

                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group1" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck10">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck10">S-15</label>

                    <input type="checkbox" class="btn-check" id="btncheck29">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck29">S-12</label>

                    <input type="checkbox" class="btn-check" id="btncheck35">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck35">D-11</label>

                    <input type="checkbox" class="btn-check" id="btncheck37">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck37">S-07</label>

                    <span class="material-symbols-outlined"> source_environment <p class="text-office">Receptionist</p>
                    </span>

                    <input type="checkbox" class="btn-check" id="btncheck38">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck38">S-02</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group1" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck11">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck11">S-14</label>

                    <input type="checkbox" class="btn-check" id="btncheck36">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck36">S-01</label>
                </div>
            </div>
            <div class="card-body py-16 px-24 d-flex flex-wrap align-items-center gap-3">
                <div class="btn-group3" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck39">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck39">S-06</label>

                    <input type="checkbox" class="btn-check" id="btncheck40">
                    <label class="btn btn-outline-primary-600 px-20 py-11" for="btncheck40">S-05</label>
                </div>
            </div>
        </div>
    </div>
@endsection
