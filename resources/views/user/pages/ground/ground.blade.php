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
    <link rel="stylesheet" href="{{ asset('wowdash/css/responsive-ground.css') }}">
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
    <div class="container-ground">
        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck1">D-05</label>
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck2">D-06</label>

            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck3">S-11</label>
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck4">SD-2</label>

            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck5">S-10</label>
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck6">D-07</label>

            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck7">S-09</label>
        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck8">JC-07</label>

            <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck9">JM-04</label>

            <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck10">D-01</label>

            <div class="flex-grow-0.8"></div>

            <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck11">D-08</label>

            <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck12">JC-03</label>

        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck13">JC-06</label>

            <input type="checkbox" class="btn-check" id="btncheck14" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck14">JM-03</label>

            <input type="checkbox" class="btn-check" id="btncheck15" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck15">D-02</label>

            <div class="flex-grow-0.8"></div>

            <input type="checkbox" class="btn-check" id="btncheck16" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck16">JC-02</label>

            <input type="checkbox" class="btn-check" id="btncheck17" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck17">D-09</label>

            <input type="checkbox" class="btn-check" id="btncheck18" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck18">S-08</label>
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            {{-- right --}}
            <input type="checkbox" class="btn-check" id="btncheck19" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck19">JC-05</label>

            <input type="checkbox" class="btn-check" id="btncheck20" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck20">JM-02</label>

            <input type="checkbox" class="btn-check" id="btncheck21" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck21">D-03</label>

            {{-- left --}}
            <input type="checkbox" class="btn-check" id="btncheck22" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck22">JC-01</label>

        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            {{-- right --}}
            <input type="checkbox" class="btn-check" id="btncheck23" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck23">JC-04</label>

            <input type="checkbox" class="btn-check" id="btncheck24" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck24">JM-01</label>

            <input type="checkbox" class="btn-check" id="btncheck25" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck25">D-04</label>

            {{-- center --}}
            <div class="flex-grow-0.9"></div>

            <input type="checkbox" class="btn-check" id="btncheck26" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck26">SD-1</label>

            <input type="checkbox" class="btn-check" id="btncheck27" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck27">D-10</label>

            {{-- left --}}
            <input type="checkbox" class="btn-check" id="btncheck28" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck28">S-04</label>
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            {{-- right --}}
            <input type="checkbox" class="btn-check" id="btncheck29" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck29">S-16</label>

            <input type="checkbox" class="btn-check" id="btncheck30" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck30">S-13</label>

            {{-- left --}}
            <input type="checkbox" class="btn-check" id="btncheck31" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck31">S-03</label>

        </div>

        <div class="btn-group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            {{-- right --}}
            <input type="checkbox" class="btn-check" id="btncheck32" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck32">S-15</label>

            <input type="checkbox" class="btn-check" id="btncheck33" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck33">S-12</label>

            {{-- center --}}
            <div class="flex-grow-0.8"></div>
            <input type="checkbox" class="btn-check" id="btncheck34" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck34">D-11</label>

            <input type="checkbox" class="btn-check" id="btncheck35" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck35">S-07</label>

            {{-- office --}}
            <label class="btn btn-outline-primary bg-white-gradient-light" style="width: 15%;">Office</label>

            {{-- left --}}
            <div class="flex-grow-1"></div>

            <input type="checkbox" class="btn-check" id="btncheck36" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck36">S-02</label>
        </div>

        <div class="btn-responsive" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck37" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck37">S-14</label>

            <input type="checkbox" class="btn-check" id="btncheck38" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck38">S-01</label>
        </div>

        <div class="btn-group-responsives" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck39" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck39">S-06</label>

            <input type="checkbox" class="btn-check" id="btncheck40" autocomplete="off">
            <label class="btn btn-outline-primary" for="btncheck40">S-05</label>
        </div>
        {{-- gate entry --}}
        <div class="group-responsive" role="group" aria-label="Basic checkbox toggle button group">
            <label class="btn btn-outline-primary" id="line-right"></label>
            <label class="btn btn-outline-primary bg-white-gradient-light" style="font-size: 8px">Pintu Masuk</label>
            <label class="btn btn-outline-primary" id="line-left"></label>
        </div>

    </div>
@endsection
